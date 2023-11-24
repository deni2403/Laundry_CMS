<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Packer Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <p>Data Barang Tersedia untuk Dipacking</p>
                @foreach ($orderTake as $order)
                    <p>{{ $order->invoice }}</p>
                    <form action="{{ route('takeOrder.packer', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Ambil Order</button>
                    </form>
                @endforeach

                <p class="mt-3">Data Barang Proses</p>
                @foreach ($orderDone as $order)
                    <p>{{ $order->invoice }}</p>
                    <form action="{{ route('doneOrder.packer', $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Selesai</button>
                    </form>
                @endforeach

                <p class="mt-3">Data Barang Take</p>
                @foreach ($orders as $order)
                    <p>{{ $order->invoice }}</p>
                    <p>{{ $order->status }}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
