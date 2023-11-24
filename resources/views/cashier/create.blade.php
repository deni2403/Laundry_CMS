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
                        <input type="text" class="form-control rounded" id="customerName" name="customer_name">
                    </div>
                    <div class="form-group">
                        <label for="service">Layanan</label>
                        <select class="form-control" id="service" name="service_id">
                            @foreach ($services as $data)
                                <option value="{{ $data->id }}">{{ $data->service_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orderIn">Tanggal Pesan</label>
                        <input type="datetime-local" class="form-control" id="orderIn" name="order_in">
                    </div>

                    <div class="form-group">
                        <label for="orderOut">Tanggal Selesai</label>
                        <input type="datetime-local" class="form-control" id="orderOut" name="order_out">
                    </div>
                    <div class="form-group">
                        <label for="totalWeight">Total Berat</label>
                        <input type="number" class="form-control" id="totalWeight" name="total_weight" step="0.01"
                            min="0">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Dalam Antrian">Dalam Antrian</option>
                            <option value="Belum dicuci">Belum dicuci</option>
                            <option value="Sedang dicuci">Sedang dicuci</option>
                            <option value="Sudah Dicuci">Sudah Dicuci</option>
                            <option value="Belum disetrika">Belum disetrika</option>
                            <option value="Sedang disetrika">Sedang disetrika</option>
                            <option value="Sudah disetrika">Sudah disetrika</option>
                            <option value="Sedang dipacking">Sedang dipacking</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="member">Member</label>
                        <select class="form-control" id="service" name="member_id">
                            <option value="">-- Kosong --</option>
                            @foreach ($members as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="checkbox-point d-flex align-items-center">
                        <label for="use_points">Gunakan Poin:</label>
                        <input type="checkbox" name="use_points" id="use_points" value="1">
                    </div>
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
