@extends('layouts.main')

@section('content')
    {{ auth()->check() }}
    <div id="member" class="member">
        <div class="container-fluid member-section">
            <h1 class="member-section__title">Informasi Profil</h1>
            <div class="row">
                <div class="col-lg-4">
                    <aside class="profile d-flex flex-column align-items-center border">
                        {{-- <img src="https://placekitten.com/200/200"
                            class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image"> --}}
                            @if (Auth::guard('member')->user()->image == null)
                                <img class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image" src="/assets/images/profile-image.png">
                            @endif
                        <img class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image" src="{{ asset('storage/' . Auth::guard('member')->user()->image) }}">

                        <h3 class="profile-name">{{ Auth::guard('member')->user()->name }}</h3>
                        <p class="profile-email">{{ Auth::guard('member')->user()->email }}</p>
                        <div class="profile-points d-flex">
                            <span class="profile-points__caption">Total Point :</span>
                            <span class="profile-points__total">{{ auth()->guard('member')->user()->total_point }}</span>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div class="profile-edit border">
                        <h2 class="profile-edit__title">Ubah Password</h2>
                        <p class="profile-edit__text">Kelola password untuk mengontrol, mengelola, dan mengamankan akun</p>
                        <div class="profile-edit__form">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="mb-4">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder=" New Password" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Password Confirmation"
                                        required>
                                </div>
                                <button type="submit" class="save-button">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
