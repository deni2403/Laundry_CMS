@extends('layouts.main')

@section('content')
    <div id="member" class="member">
        <div class="container-fluid member-section">
            <h1 class="member-section__title">Informasi Profil</h1>
            <div class="row">
                <div class="col-lg-4">
                    <aside class="profile d-flex flex-column align-items-center border">
                        <img src="https://placekitten.com/200/200"
                            class="img-fluid rounded-circle img-thumbnail profile-image" alt="Profile Image">
                        <h3 class="profile-name">Joko Abdi</h3>
                        <p class="profile-email">Jokoabdi@gmail.com</p>
                        <div class="profile-points d-flex">
                            <span class="profile-points__caption">Total Point :</span>
                            <span class="profile-points__total">130 Point</span>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-8">
                    <div class="profile-edit border">
                        <h2 class="profile-edit__title">Ubah Profil</h2>
                        <p class="profile-edit__text">Kelola profil untuk mengontrol, mengelola, dan mengamankan akun</p>
                        <div class="profile-edit__form">
                            <form>
                                <div class="mb-4">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="email"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="phone">No. Telepon</label>
                                    <input type="phone" id="phone" class="form-control" placeholder="No. Telepon"
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
