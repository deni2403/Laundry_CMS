@extends('layouts.main')


@section('content')
    <div id="tracking" class="section-tracking">
        <div class="container-fluid tracking">
            <h1 class="tracking-header__title">Traking Pesanan Service Mu !</h1>
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="tracking-search-bar d-flex align-items-center">
                        <button class="tracking-search-bar__button">Cari</button>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"
                                    style="color: #afb4bb;"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive mb-3">
                        <table class="table table-striped tracking-table border shadow-sm">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Service</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>1</td>
                                    <td>0098667</td>
                                    <td>Hanum Faulinnuur</td>
                                    <td>Cuci Setrika</td>
                                    <td>17/11/2023</td>
                                    <td>
                                        <button class="status-btn__process">
                                            On Proses
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>0098667</td>
                                    <td>Hanum Faulinnuur</td>
                                    <td>Cuci Setrika</td>
                                    <td>17/11/2023</td>
                                    <td>
                                        <button class="status-btn__finish">
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
    </div>
</div>
@endsection
