@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Daftar Rekap Orderan</h1>
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
                                    <th>Tgl. Pesanan</th>
                                    <th>Tgl. Selesai</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    @if (auth()->user()->role == 'superadmin')
                                        <th>Kasir</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($orders as $data)
                                    <tr>
                                        <td>{{ $data->invoice }}</td>
                                        <td>{{ $data->customer_name }}</td>
                                        <td>{{ $data->service->service_name }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ date('d M Y', strtotime($data->order_in)) }}</td>
                                        <td>{{ date('d M Y', strtotime($data->order_out)) }}</td>
                                        <td>{{ $data->total_weight }} Kg</td>
                                        <td>{{ $data->total_price }}</td>
                                        @if (auth()->user()->role == 'superadmin')
                                            <td>{{ $data->cashierId->name }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center py-2">{{ $orders->links() }}</div>
        </div>
    </div>
@endsection
