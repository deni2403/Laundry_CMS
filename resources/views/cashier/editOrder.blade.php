@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <a href="{{ route('orderData.cashier') }}" class="btn btn-danger mt-2"><i
                class="fa-solid fa-arrow-left me-1"></i>Kembali</a>
        <div class="event-index shadow-sm border">
            <h1 class="form-title">Edit Data Order</h1>
            <hr class="divider">
            <div class="form-input">
                <form method="POST" action="{{ route('updateOrder.cashier', $order->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">
                            @if ($order->member_id)
                                Nama Pelanggan (Member)
                            @else
                                Nama Pelanggan (Bukan Member)
                            @endif
                        </label>
                        @if ($order->member_id)
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                id="customer_name" name="customer_name" required autofocus readonly
                                value="{{ old('customer_name', $order->customer_name) }}">
                        @else
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                id="customer_name" name="customer_name" required autofocus
                                value="{{ old('customer_name', $order->customer_name) }}">
                        @endif
                        @error('customer_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @error('customer_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="order_in" class="form-label">Order In</label>
                        <input type="datetime-local" class="form-control @error('order_in') is-invalid @enderror"
                            id="order_in" name="order_in" required autofocus
                            value="{{ old('order_in', $order->order_in) }}">
                    </div>
                    @error('order_in')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="order_out" class="form-label">Order Out</label>
                        <input type="datetime-local" class="form-control @error('order_out') is-invalid @enderror"
                            id="order_out" name="order_out" required autofocus
                            value="{{ old('order_out', $order->order_out) }}">
                    </div>
                    @error('order_out')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="total_weight" class="form-label">Total Berat</label>
                        <input type="number" class="form-control @error('total_weight') is-invalid @enderror"
                            id="total_weight" name="total_weight" required autofocus step="any" min="0"
                            value="{{ old('total_weight', $order->total_weight) }}">
                        @error('total_weight')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @error('total_weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="service_id" class="form-label">Service</label>
                        <select type="text" class="form-control" id="service_id" name="service_id">
                            <option value="{{ $order->service->id }}">Rp. {{ $order->service->service_price }} -
                                {{ $order->service->service_name }}</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }} - Rp.
                                    {{ $service->service_price }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="form-button">
                        <i class="fa-solid fa-pen me-2"></i>Edit
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
