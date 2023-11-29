@extends('layouts.master')

@section('content')
    <div class="content-wrapper container-fluid">
        <a href="/admin/events" class="btn btn-danger mt-2">Kembali</a>
        <div class="detail-event">
            <h1 class="detail-event__title text-center">{{ $event->title }}</h1>
            <div class="row">
                <div class="col">
                    <div class="event-info">
                        <div class="event-info__image d-flex justify-content-center">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid"
                                    alt="{{ $event->title }}">
                            @else
                                <img src="/assets/images/event-image.png" class="img-fluid" alt="{{ $event->title }}">
                            @endif
                        </div>
                        <div class="event-info__date">
                            <span class="event-info__date-icon"><i class="fa-regular fa-calendar-days"
                                    style="color: #595858;"></i></span>
                            <span class="event-info__date-text">{{ $event->created_at->format('d  M  Y') }}</span>
                        </div>
                        @if ($event->author != null)
                            <p class="event-info__author">Posted by : {{ $event->author->name }}</p>
                        @else
                            <p class="event-info__author">Posted by : Alza Laundry</p>
                        @endif
                        <div class="event-info-context">
                            <p>{!! $event->body !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
