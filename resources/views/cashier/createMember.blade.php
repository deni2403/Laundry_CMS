@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="form-title">Tambah Data Member</h1>
            <hr class="divider">
            <div class="form-input">
                <form action="{{ route('storeOrder.cashier') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="customerName">Nama Pelanggan</label>
                        <input type="text" class="form-control rounded" id="customerName" name="customer_name">
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email</label>
                        <input type="email" class="form-control rounded" id="customerEmail" name="customer_email">
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">No. Telepon</label>
                        <input type="text" class="form-control rounded" id="customerPhone" name="customer_phone">
                    </div>
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
