@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('indexMember.cashier') }}" class="btn btn-danger mt-2">Kembali</a>
        <div class="event-index shadow-sm border">
            <h1 class="form-title">Tambah Data Member</h1>
            <hr class="divider">
            <div class="form-input">
                <form method="POST" action="{{ route('storeMember.cashier') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group" style="position: relative;">
                        <label for="password">Password</label>
                        <input type="password" class="form-control password-input" id="password"
                            name="password" required>
                        <button class="show-btn"><i class="fa-solid fa-eye" style="color: #545454;"></i></button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="form-group">
                        <label for="phone_number">No. Telepon</label>
                        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                    </div>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Tambah Member')
