@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="superadmin-dashboard">
            <h1 class="superadmin-dashboard__title">Beranda</h1>
            <div class="row">
                <div class="col">
                    <div class="dashboard-information d-flex flex-wrap">
                        <div class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                            <div class="dashboard-information__item-image rounded-circle">
                                <img src="/assets/icons/total-order.png" class="img-fluid" alt="total order">
                            </div>
                            <div class="dashboard-information__desc-box">
                                <h2 class="dashboard-information__desc-box__value">200</h2>
                                <p class="dashboard-information__desc-box__text">Total Order</p>
                            </div>
                        </div>
                        <div class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                            <div class="dashboard-information__item-image rounded-circle">
                                <img src="/assets/icons/process-order.png" class="img-fluid" alt="process order">
                            </div>
                            <div class="dashboard-information__desc-box">
                                <h2 class="dashboard-information__desc-box__value">200</h2>
                                <p class="dashboard-information__desc-box__text">Total Order</p>
                            </div>
                        </div>
                        <div class="dashboard-information__item shadow-sm d-flex justify-content-center align-items-center">
                            <div class="dashboard-information__item-image rounded-circle">
                                <img src="/assets/icons/complete-order.png" class="img-fluid" alt="complete order">
                            </div>
                            <div class="dashboard-information__desc-box">
                                <h2 class="dashboard-information__desc-box__value">200</h2>
                                <p class="dashboard-information__desc-box__text">Total Order</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
