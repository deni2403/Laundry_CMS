@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="form-title">Tambah Data Pesanan</h1>
            <hr class="divider">
            <div class="form-input">
                <form action="{{ route('storeOrder.cashier') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="customerName">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customerName" name="customer_name"
                            value="">
                    </div>
                    @error('customer_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="service">Layanan</label>
                        <select class="form-control" id="service" name="service_id">
                            @foreach ($services as $data)
                                <option value="{{ $data->id }}" data-price="{{ $data->service_price }}">{{ $data->service_name }} - Rp. {{ $data->service_price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orderIn">Tanggal Pesan</label>
                        <input type="datetime-local" class="form-control @error('order_in') is-invalid @enderror" id="orderIn" name="order_in">
                    </div>
                    @error('order_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="orderOut">Tanggal Selesai</label>
                        <input type="datetime-local" class="form-control @error('order_out') is-invalid @enderror" id="orderOut" name="order_out">
                    </div>
                    @error('order_out')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="totalWeight">Total Berat</label>
                        <input type="number" class="form-control @error('total_weight') is-invalid @enderror" id="totalWeight" name="total_weight" step="0.1"
                            min="0">
                    </div>
                    @error('total_weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Dalam antrian">Dalam antrian</option>
                            <option value="Sudah dicuci">Sudah Dicuci</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="member">Member</label>
                        <select class="form-control" id="member_id" name="member_id">
                            <option value="">-- Kosong --</option>
                            @foreach ($members as $data)
                                <option value="{{ $data->id }}">{{ $data->name }} - {{ $data->total_point }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="checkbox-point d-flex">
                        <label for="use_points">Gunakan Poin</label>
                        <input type="checkbox" name="use_points" id="use_points" value="1">
                    </div>
                    <div class="order-price d-flex align-items-end justify-content-end flex-column">
                        <div class="diskon d-flex justify-between">
                            <p>Diskon : </p>
                            <span></span>
                        </div>
                        <div class="price d-flex justify-between">
                            <p>Harga :</p>
                            <span></span>
                        </div>
                        <div class="total-price d-flex justify-between">
                            <p>Total :</p>
                            <span></span>
                        </div>
                    </div>
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Tambah Pesanan')
