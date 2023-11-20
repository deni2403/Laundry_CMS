@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="/admin/events" class="btn btn-success mt-3 mx-3">Back</a>
        <div class="create-event">
            <h1 class="create-event__title">Update Event Information</h1>
            <div class="create-event__form">

                <form method="POST" action="/admin/events/{{ $event->slug }}">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            value="{{ old('title', $event->title) }}" name="title" required autofocus>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            value="{{ old('slug', $event->slug) }}" name="slug" required>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ old('body', $event->body) }}">
                        <trix-editor input="body"></trix-editor>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Events</button>
                </form>
            </div>
        </div>
    </div>
@endsection
