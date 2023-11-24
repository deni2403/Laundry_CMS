@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="/superadmin/users" class="btn btn-danger mt-2"><i class="fa-solid fa-arrow-left me-1"></i>Kembali</a>
        <div class="create-event shadow-sm border">
            <h1 class="create-event__title">Edit Data Pengguna</h1>
            <div class="create-event__form">
                <form method="POST" action="/superadmin/users/{{ $user->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required autofocus value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required autofocus value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select type="text" class="form-control" id="role" name="role">
                            <option value="{{ old('role'), $user->role }}">{{ $user->role }}</option>
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
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-pen me-2"></i>Edit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
