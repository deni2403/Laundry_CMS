@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="admin-dashboard">
            <h1 class="admin-dashboard__title">Event Yang Terakhir Dibuat</h1>
            <div class="row">
                <div class="col">
                    <div class="event-list d-flex flex-wrap">
                        @foreach ($events as $event)
                            <a href="/admin/dashboard/{{ $event->slug }}">
                                <div class="card m-3 shadow-sm">
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top img-fluid"
                                            alt="{{ $event->title }}">
                                    @else
                                        <img src="/assets/images/event-image.png" class="card-img-top img-fluid"
                                            alt="{{ $event->title }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->title }}</h5>
                                        <p class="card-text">{{ $event->created_at->format('d  M  Y') }}</p>
                                        @if ($event->author != null)
                                            <p class="card-text">Posted by : {{ $event->author->name }}</p>
                                        @else
                                            <p class="card-text">Posted by : Alza Laundry</p>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center py-2">{{ $events->links() }}</div>
    </div>
@endsection
