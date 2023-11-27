@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Daftar Proses Order Laundry</h1>
            {{-- @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}
            <hr class="divider">
            <div class="row">
                <div class="col">
                    <div class="table-responsive event-index__table my-2">
                        <table class="table table-striped border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($orders as $data)
                                    <tr>
                                        <td>{{ $data->invoice }}</td>
                                        <td>{{ $data->customer_name }}</td>
                                        <td>{{ $data->service->service_name }}</td>
                                        <td>{{ $data->status }}</td>
                                        @if ($data->status == 'Dalam antrian')
                                            <td>
                                                <form action="{{ route('changeStatus1.cashier', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button">Belum Dicuci</button>
                                                </form>
                                            </td>
                                        @endif

                                        @if ($data->status == 'Belum dicuci')
                                            <td>
                                                <form action="{{ route('changeStatus2.cashier', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button">Sedang Dicuci</button>
                                                </form>
                                            </td>
                                        @endif

                                        @if ($data->status == 'Sedang dicuci')
                                            <td>
                                                <form action="{{ route('changeStatus3.cashier', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button">Sudah Dicuci</button>
                                                </form>
                                            </td>
                                        @endif

                                        @if ($data->status == 'Selesai' && $data->member_id != null)
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <form action="{{ route('store.wa', $data->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Kirim WhatsApp</button>
                                                    </form>
                                                    <form action="{{ route('changeStatus4.cashier', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-warning">Sudah Diambil</button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif

                                        @if ($data->status == 'Selesai' && $data->member_id == null)
                                            <td>
                                                <form action="{{ route('changeStatus4.cashier', $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button">Sudah Diambil</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center py-2">{{ $events->links() }}</div> --}}
    </div>
@endsection
