@extends('layouts.main')

@section('content')
    <header id="hero" class="hero-section">
        <div class="container-fluid hero-section-jumbotron">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-description container-fluid">
                        <h1 class="hero-description__title">Cuci dan lipat tanpa repot!, Alza Laundry Solusinya.
                        </h1>
                        <p class="hero-description__text">Dengan layanan laundry kami, Anda tidak perlu lagi
                            khawatir tentang mencuci pakaian. Pakaian bersih, harum, dan segar adalah janji kami.
                        </p>
                        <button class="hero-description__button d-flex align-items-center shadow-sm">
                            <a href="" class="me-4">Hubungi Kami</a>
                            <img src="/assets/icons/wa.png" class="img-fluid" alt="location">
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="container-fluid hero-image">
                        <img src="/assets/images/hero-img.png" alt="Hero Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="service" class="service-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container-fluid section-info mt-5 mb-4 text-center">
                        <h2 class="section-info__title">Layanan Laundry</h2>
                        <p class="section-info__text">Kami memberikan perawatan terbaik untuk pakaian anda. Setiap
                            helai pakaian diolah dengan cermat dan penuh perhatian.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="section-serviceImage d-flex justify-content-center flex-wrap">
                        @foreach ($services as $service)
                            <div
                                class="container-fluid section-serviceImage__item shadow-sm d-flex flex-column align-items-center m-2">
                                <div class="section-serviceImage__item-img rounded-circle">
                                    <img src="{{ $service['image'] }}" alt="Cuci Setrika Reguler" class="img-fluid m-2">
                                </div>
                                <p class="section-serviceImage__item-title">{{ $service['title'] }}</>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="event" class="event-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container-fluid section-info text-center">
                        <h2 class="section-info__title">Event Terbaru</h2>
                        <p class="section-info__text">Selalu ada yang menarik kegiatan Alza Laundry mulai dari
                            kegiatan rutin setiap bulan hingga potongan diskon yang membuat harimu cerah !</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container-fluid event-section-item d-flex justify-content-center flex-wrap">
                        @foreach ($events as $event )
                        <div class="card m-2 shadow-sm">
                            <img src="/assets/images/event-image.png" class="card-img-top img-fluid" alt="Event Image">
                            <div class="card-body m-1">
                                <h5 class="card-title">{{ $event->created_at->format('d M Y') }}</h5>
                                <p class="card-text">{{ $event->title }}</p>
                                <a href="/events/{{ $event->slug }}" class="btn event-btn py-1">Read More -></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container-fluid event-section-pagination d-flex justify-content-center">
                        {{-- <ul class="event-pagination d-flex justify-content-center">
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">
                                    < </a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">1</a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">2</a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">3</a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">4</a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">5</a>
                            </li>
                            <li class="event-pagination__item">
                                <a href="" class="event-pagination__link">></a>
                            </li>
                        </ul> --}}
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection