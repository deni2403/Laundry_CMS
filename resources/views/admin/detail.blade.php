@extends('layouts.master')

@section('content')
    <div class="content-wrapper container-fluid">
        <a href="/admin/dashboard" class="btn btn-success mt-2">Back</a>
        <div class="detail-event">
            <h1 class="detail-event__title text-center">{{ $event->title }}</h1>
            <div class="row">
                <div class="col">
                    <div class="event-info">
                        <div class="event-info__image d-flex justify-content-center">
                            <img src="/assets/images/event-detail.png" class="img-fluid" alt="Event Detail">
                        </div>
                        <div class="event-info__date">
                            <span class="event-info__date-icon"><i class="fa-regular fa-calendar-days"
                                    style="color: #595858;"></i></span>
                            <span class="event-info__date-text">{{ $event->created_at->format('d  M  Y') }}</span>
                        </div>
                        <p class="event-info__author">Posted by : {{ $event->author->name }}</p>
                        <div class="event-info-context">
                            <p>{!! $event->body !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
