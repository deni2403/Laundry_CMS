@extends('layouts.master')

@section('content')
    <div class="content-wrapper container-fluid">
        <div class="event-index">
            <h1 class="event-index__title">All Created Events</h1>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <a href="/admin/events/create" class="btn btn-primary my-3">Add Event</a>
                    <div class="table-responsive event-index__table">
                        <table class="table table-striped border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->slug }}</td>
                                        <td>{{ $event->created_at->format('d/M/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center action-button">
                                                <a href="/admin/events/{{ $event->slug }}" class="btn btn-success mx-1"
                                                    title="Show"><i class="fa-solid fa-eye"></i></a>
                                                <a href="/admin/events/{{ $event->slug }}/edit"
                                                    class="btn btn-warning mx-1" title="Edit"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <form action="/admin/events/{{ $event->slug }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger mx-1" title="Delete"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
