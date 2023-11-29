@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Daftar Semua Member</h1>
            <div class="row">
                <div class="col">
                    <a href="{{ route('createMember.cashier') }}" class="btn btn-primary my-2"><i
                            class="fa-solid fa-user-plus me-1"></i>Tambah</a>
                    <div class="table-responsive event-index__table my-2">
                        <table class="table table-striped border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Email</th>
                                    <th>No. Handphone</th>
                                    <th>Total Point</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone_number }}</td>
                                        <td>{{ $member->total_point }}</td>
                                        <td>{{ date('d M Y', strtotime($member->registration_date)) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center action-button">
                                                <a href="{{ route('editMember.cashier', $member->id) }}}"
                                                    class="btn btn-warning mx-1" title="Edit"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <form action="{{ route('destroyMember.cashier', $member->id) }}"
                                                    method="POST">
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
            <div class="d-flex justify-content-center py-2">{{ $members->links() }}</div>
        </div>
    </div>
@endsection
