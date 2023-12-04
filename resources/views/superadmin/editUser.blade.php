@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="/superadmin/users" class="btn btn-danger mt-2"><i class="fa-solid fa-arrow-left me-1"></i>Kembali</a>
        <div class="event-index shadow-sm border">
            <h1 class="form-title">Edit Data Pengguna</h1>
            <hr class="divider">
            <div class="form-input">
                <form method="POST" action="{{ route('updateUser.superadmin', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required autofocus value="{{ old('name', $user->name) }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required autofocus value="{{ old('email', $user->email) }}">
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group" style="position: relative;">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control password-input" id="password" name="password" autofocus
                            value="">
                        <button class="show-btn"><i class="fa-solid fa-eye" style="color: #545454;"></i></button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="role" class="form-label">Role</label>
                        <select type="text" class="form-control" id="role" name="role">
                            <option hidden value="{{ $user->role }}">{{ $user->role }}</option>
                            <option value="superadmin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="cashier">Cashier</option>
                            <option value="ironer">Ironer</option>
                            <option value="packer">Packer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $user->image }}" id="image">
                        @if ($user->image)
                            <img src="{{ asset('storage/' . $user->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-pen me-2"></i>Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Edit Pengguna')
