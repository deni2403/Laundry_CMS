<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Fill in the data form below correctly!</h1>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="container p-6">
                    <form action="{{route('orders.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="customerName">Nama Pelanggan</label>
                                <input type="text" class="form-control rounded" id="customerName"
                                    name="customer_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="service">Layanan</label>
                                <select class="form-control" id="service" name="service_id">
                                    @foreach ($services as $data)
                                        <option value="{{ $data->id }}">{{ $data->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="orderIn">Tgl. Pesan</label>
                                <input type="date" class="form-control" id="orderIn" name="order_in">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="orderOut">Tgl. Selesai</label>
                            <input type="date" class="form-control" id="orderOut" name="order_out">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="totalWeight">Total Berat</label>
                            <input type="number" class="form-control" id="totalWeight" name="total_weight"
                                min="0">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Dalam Antrian">Dalam Antrian</option>
                                <option value="Belum dicuci">Belum dicuci</option>
                                <option value="Sedang dicuci">Sedang dicuci</option>
                                <option value="Sudah Dicuci">Sudah Dicuci</option>
                                <option value="Belum disetrika">Belum disetrika</option>
                                <option value="Sedang disetrika">Sedang disetrika</option>
                                <option value="Sudah disetrika">Sudah disetrika</option>
                                <option value="Sedang dipacking">Sedang dipacking</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="member">Anggota</label>
                            <select class="form-control" id="service" name="member_id">
                                <option value="">-- Kosong --</option>
                                @foreach ($members as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
