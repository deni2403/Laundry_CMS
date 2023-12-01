@extends('layouts.main')

@section('content')
    <div id="event" class="section-detailEvent">
        <div class="container-fluid detail-event">
            <h1 class="event-detail__title text-center">{{ $event->title }}</h1>
            <div class="row">
                <div class="col-lg-9 col-md-8 event-col">
                    <div class="event-info">
                        <div class="event-info__image d-flex justify-content-center">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid"
                                    alt="{{ $event->title }}">
                            @else
                                <img src="/assets/images/no-event.png" class="img-fluid" alt="{{ $event->title }}">
                            @endif
                        </div>
                        <div class="event-info__date">
                            <span class="event-info__date-icon"><i class="fa-regular fa-calendar-days"
                                    style="color: #595858;"></i></span>
                            <span class="event-info__date-text">{{ $event->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="event-info-context">
                            <p>{!! $event->body !!}</p>
                        </div>
                    </div>
                </div>
                <hr class="divider d-md-none">
                <div class="col-lg-3 col-md-4">
                    <aside class="aside-event">
                        <h3 class="aside-event__title">Event Terbaru</h3>
                        <div class="aside-event__content">
                            @foreach ($events as $e)
                                <div class="card my-3 shadow-sm">
                                    @if ($e->image)
                                        <img src="{{ asset('storage/' . $e->image) }}" class="card-img-top img-fluid"
                                            alt="{{ $e->title }}">
                                    @else
                                        <img src="/assets/images/event-image.png" class="card-img-top img-fluid"
                                            alt="{{ $e->title }}">
                                    @endif
                                    <a href="/events/{{ $e->slug }}" class="text-decoration-none">
                                        <div class="card-body m-1">
                                            <h5 class="card-title">{{ $e->created_at->format('d M Y') }}</h5>
                                            <p class="card-text">{{ $e->title }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Event')
