@extends('layouts.main')

@section('content')
    <div id="member" class="member">
        <div class="container-fluid member-section">
            <h1 class="member-section__title">Informasi Profil</h1>
            <div class="row">
                <div class="col-lg-4">
                    <aside class="profile d-flex flex-column align-items-center border">
                        @if (Auth::guard('member')->user()->image == null)
                            <img class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png">
                        @else
                            <img class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image"
                                src="{{ asset('storage/' . Auth::guard('member')->user()->image) }}">
                        @endif
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
                        <p class="profile-edit__text">Kelola Password untuk mengontrol, mengelola, dan mengamankan akun</p>
                        <div class="profile-edit__form">
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')
                                <div class="mb-3" style="position: relative;">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" id="current_password" name="current_password"
                                        class="form-control password-input" placeholder="Current Password">
                                    <button class="show-btn"><i class="fa-solid fa-eye"
                                            style="color: #545454;"></i></button>
                                </div>
                                <div class="mb-3" style="position: relative;">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control password-input" placeholder=" New Password">
                                    <button class="show-btn"><i class="fa-solid fa-eye"
                                            style="color: #545454;"></i></button>
                                </div>
                                <div class="mb-3" style="position: relative;">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control password-input" placeholder="Password Confirmation">
                                    <button class="show-btn"><i class="fa-solid fa-eye"
                                            style="color: #545454;"></i></button>
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

@section('title', 'Alza Laundry | Profil')
