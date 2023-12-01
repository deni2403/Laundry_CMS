@extends('layouts.main')


@section('content')
    <div id="tracking" class="section-tracking">
        <div class="container-fluid tracking">
            <h1 class="tracking-header__title">Lacak Pesanan Kamu !</h1>
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="tracking-search-bar d-flex align-items-center">
                        <form action="{{ route('tracking') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="invoice" id="invoice" class="form-control" required>
                                <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #afb4bb;"></i></span>
                            </div>
                            <button class="tracking-search-bar__button mt-3" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped tracking-table border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Service</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <tr>
                                    @isset($logs)
                                        @isset($order)
                                            <td>{{ $order->invoice }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->service->service_name }}</td>
                                            <td>{{ date('d M Y', strtotime($order->order_in)) }}</td>
                                        @endisset
                                        @foreach ($logs as $log)
                                            <td>{{ $log->after_status }} -
                                                {{ date('d M Y | H:i', strtotime($log->updated_at)) }}</td>
                                        @endforeach
                                    @endisset
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('title', 'Alza Laundry | Lacak Status')
