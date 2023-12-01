@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Semua Event</h1>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <a href="/admin/events/create" class="btn btn-primary my-2"><i
                            class="fa-solid fa-file-circle-plus me-1"></i>Buat Event</a>
                    <div class="table-responsive event-index__table my-2">
                        <table class="table table-striped border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->created_at->format('d/M/Y') }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->slug }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center action-button">
                                                <a href="/admin/events/{{ $event->slug }}" class="btn btn-success mx-1"
                                                    title="Show">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="/admin/events/{{ $event->slug }}/edit"
                                                    class="btn btn-warning mx-1" title="Edit">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                <button class="btn btn-danger mx-1" title="Delete" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal_{{ $event->slug }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            <div class="modal fade" id="confirmDeleteModal_{{ $event->slug }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteModalLabel">
                                                                Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah kamu yakin ingin menghapus event ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form id="deleteForm_{{ $event->slug }}"
                                                                action="/admin/events/{{ $event->slug }}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
        <div class="d-flex justify-content-center py-2">{{ $events->links() }}</div>
    </div>
@endsection
