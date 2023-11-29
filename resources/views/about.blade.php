@extends('layouts.main')

@section('content')
    <div id="about" class="about-section">
        <div class="container-fluid about-profile">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-profile-image">
                        <img src="/assets/images/about-us.png" class="shadow-sm" alt="About Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-profile-description">
                        <h1 class="about-profile-description__title">
                            Tentang Alza Laundry
                        </h1>
                        <p class="about-profile-description__text">
                            Alza Laundry adalah bisnis laundry lokal yang berkomitmen untuk memberikan layanan laundry
                            berkualitas dan handal kepada pelanggan kami. Sejak didirikan pada tahun 2009, kami telah tumbuh
                            dan berkembang menjadi salah satu pilihan terkemuka dalam industri laundry di Jawa Barat.
                        </p>
                        <a href="">
                            <button class="about-profile-description__button d-flex align-items-center shadow-sm">
                                <span class="me-4">Kunjungi Lokasi</span>
                                <img src="/assets/icons/location.png" class="img-fluid" alt="location">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
