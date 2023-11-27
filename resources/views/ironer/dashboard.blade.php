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
                                @foreach ($orderTake as $order)
                                    <tr>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->service->service_name }}</td>
                                        <td>{{ $order->order_in }}</td>
                                        <td>{{ $order->order_out }}</td>
                                        <td>{{ $order->total_weight }} Kg</td>
                                        @if ($order->status == 'Sudah dicuci')
                                            <td>
                                                <form action="{{ route('takeOrder.ironer', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button">Ambil Order</button>
                                                </form>
                                            </td>
                                        @endif

                                        {{-- <td>
                                            <button class="update-button">
                                                Ambil Order
                                            </button>
                                        </td> --}}
                                    </tr>
                                @endforeach
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
                                @foreach ($orderDone as $order)
                                    <tr>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->service->service_name }}</td>
                                        <td>{{ $order->order_in }}</td>
                                        <td>{{ $order->order_out }}</td>
                                        <td>{{ $order->total_weight }} Kg</td>
                                        @if ($order->status == 'Sedang disetrika')
                                            <td>
                                                <form action="{{ route('doneOrder.ironer', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="update-button-finish">Selesai</button>
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
