@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="/admin/events" class="btn btn-danger mt-2">Kembali</a>
        <div class="create-event shadow-sm border">
            <h1 class="create-event__title">Buat Event Baru</h1>
            <div class="create-event__form">
                <form method="POST" action="/admin/events" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}" required>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        @error('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <div class="trix-container">
                            <trix-editor input="body"></trix-editor>
                        </div>
                        </select>
                    </div>
                    <button type="submit" class="form-button"><i class="fa-solid fa-file-circle-plus me-1"></i>Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
