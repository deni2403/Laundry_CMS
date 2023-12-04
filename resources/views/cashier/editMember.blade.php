@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('indexMember.cashier') }}" class="btn btn-danger mt-2">Kembali</a>
        <div class="event-index shadow-sm border">
            <h1 class="form-title">Update Informasi Member</h1>
            <hr class="divider">
            <div class="form-input">
                <form method="POST" action="/cashier/members/{{ $member->id }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $member->name) }}" required>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $member->email) }}" required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group" style="position: relative;">
                        <label for="password">Password</label>
                        <input type="password" class="form-control password-input" id="password" name="password">
                        <button class="show-btn"><i class="fa-solid fa-eye" style="color: #545454;"></i></button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="phone_number">No. Telepon</label>
                        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" name="phone_number" value="{{ old('phone_number', $member->phone_number) }}"
                            required>
                    </div>
                    @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $member->image }}">
                        @if ($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-file-circle-plus me-1"></i>Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Edit Member')
