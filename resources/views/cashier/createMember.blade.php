@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="form-title">Tambah Data Member</h1>
            <hr class="divider">
            <div class="form-input">
                <form action="{{ route('storeMember.cashier') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control rounded" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control rounded" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">No. Telepon</label>
                        <input type="number" class="form-control rounded" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="iamge">Image</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" onchange="previewImage()">
                    </div>

                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
