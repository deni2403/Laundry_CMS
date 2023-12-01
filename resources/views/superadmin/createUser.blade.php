@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="/superadmin/users" class="btn btn-danger mt-2"><i class="fa-solid fa-arrow-left me-1"></i>Kembali</a>
        <div class="event-index shadow-sm border">
            <h1 class="form-title">Buat Pengguna Baru</h1>
            <hr class="divider">
            <div class="form-input">
                <form method="POST" action="{{ route('storeUser.superadmin') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required autofocus value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required autofocus value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" required autofocus value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select type="text" class="form-control" id="role" name="role">
                            <option value="" disabled>--User Role--</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="cashier">Cashier</option>
                            <option value="ironer">Ironer</option>
                            <option value="packer">Packer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" onchange="previewImage()">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-user-plus me-1"></i>Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
