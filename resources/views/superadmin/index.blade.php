@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Semua Pengguna</h1>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <a href="/superadmin/users/create" class="btn btn-primary my-2"><i class="fa-solid fa-user-plus me-1"></i>Tambah</a>
                    <div class="table-responsive event-index__table my-2">
                        <table class="table table-striped border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center action-button">
                                                <a href="/superadmin/users/{{ $user->id }}/edit" class="btn btn-warning mx-1" title="Edit"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <form action="#" method="POST">
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
