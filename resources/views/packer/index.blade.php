@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="event-index shadow-sm">
            <h1 class="event-index__title">Rekap Orderan Yang Telah Dibungkus</h1>
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
                                    @if (auth()->user()->role == 'superadmin')
                                        <th>Pembungkus</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->service->service_name }}</td>
                                        <td>{{ date('d M Y', strtotime($order->order_in)) }}</td>
                                        <td>{{ date('d M Y', strtotime($order->order_out)) }}</td>
                                        <td>{{ $order->total_weight }} Kg</td>
                                        @if (auth()->user()->role == 'superadmin')
                                            @if ($order->packer_id)
                                                <td>{{ $order->packerId->name }}</td>
                                            @else
                                                <td>Pembungkus</td>
                                            @endif
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
