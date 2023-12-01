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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->service->service_name }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ date('d M Y', strtotime($order->order_in)) }}</td>
                                        <td>{{ date('d M Y', strtotime($order->order_out)) }}</td>
                                        <td>{{ $order->total_weight }} Kg</td>
                                        <td>{{ $order->total_price }}</td>
                                        @if (auth()->user()->role == 'superadmin')
                                            @if ($order->cashier_id)
                                                <td>{{ $order->cashierId->name }}</td>
                                            @else
                                                <td>Kasir</td>
                                            @endif
                                        @endif
                                        <td>
                                            <div class="d-flex justify-content-center align-items-center action-button">
                                                <a href="{{ route('editOrder.cashier', ['order' => $order->id]) }}"
                                                    class="btn btn-warning mx-1" title="Edit">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>

                                                <button class="btn btn-danger mx-1" title="Delete" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal_{{ $order->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDeleteModal_{{ $order->id }}"
                                                tabindex="-1"
                                                aria-labelledby="confirmDeleteModalLabel_{{ $order->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteModalLabel_{{ $order->id }}">
                                                                Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah kamu yakin ingin menghapus orderan ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('destroyOrder.cashier', $order->id) }}"
                                                                method="POST">
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
            <div class="d-flex justify-content-center py-2">{{ $orders->links() }}</div>
        </div>
    </div>
@endsection
