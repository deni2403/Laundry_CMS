@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Daftar Order Baru</h1>
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
                                    <th>Tgl. Pesanan</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Berat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>12121231</td>
                                    <td>Mawar Melati</td>
                                    <td>Cuci Reguler</td>
                                    <td>20/12/2023</td>
                                    <td>25/12/2023</td>
                                    <td>10 Kg</td>
                                    <td>
                                        <button class="update-button">
                                            Ambil Order
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center py-2">{{ $events->links() }}</div> --}}

        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Daftar Order Yang Sedang Diproses</h1>
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
                                    <th>Tgl. Pesanan</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Berat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>12121231</td>
                                    <td>Mawar Melati</td>
                                    <td>Cuci Reguler</td>
                                    <td>20/12/2023</td>
                                    <td>25/12/2023</td>
                                    <td>10 Kg</td>
                                    <td>
                                        <button class="complete-button">
                                            Selesai
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-center py-2">{{ $events->links() }}</div> --}}
    </div>
@endsection
