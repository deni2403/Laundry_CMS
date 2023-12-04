@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="superadmin-dashboard">
            <h1 class="superadmin-dashboard__title">Beranda</h1>
            <div class="row">
                <div class="col">
                    <div class="dashboard-information d-flex flex-wrap">
                        <a href="{{ route('orderData.cashier') }}" class="text-decoration-none">
                            <div
                                class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                                <div class="dashboard-information__item-image rounded-circle">
                                    <img src="/assets/icons/total-order.png" class="img-fluid" alt="total order">
                                </div>
                                <div class="dashboard-information__desc-box">
                                    <h2 class="dashboard-information__desc-box__value">{{ $totalOrder->count() }}</h2>
                                    <p class="dashboard-information__desc-box__text">Total Order</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('dashboard.cashier') }}" class="text-decoration-none">
                            <div
                                class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                                <div class="dashboard-information__item-image rounded-circle">
                                    <img src="/assets/icons/process-order.png" class="img-fluid" alt="process order">
                                </div>
                                <div class="dashboard-information__desc-box">
                                    <h2 class="dashboard-information__desc-box__value">{{ $orderProcess->count() }}</h2>
                                    <p class="dashboard-information__desc-box__text">Sedang Berjalan</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('orderData.cashier') }}" class="text-decoration-none">
                            <div
                                class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                                <div class="dashboard-information__item-image rounded-circle">
                                    <img src="/assets/icons/complete-order.png" class="img-fluid" alt="complete order">
                                </div>
                                <div class="dashboard-information__desc-box">
                                    <h2 class="dashboard-information__desc-box__value">{{ $completedOrder->count() }}
                                    </h2>
                                    <p class="dashboard-information__desc-box__text">Selesai</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
