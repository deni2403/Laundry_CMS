<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cashier Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                {{-- <form action="{{ url('form-send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="\">No WA</label>
                        <input type="text" name="no_wa"
                            class="form-control" id="" placeholder="No WA">
                    </div>
                    <div class="form-group">
                        <label for="\">Pesan</label>
                        <textarea name="pesan" class="form-control"
                            cols="30" rows="5" placeholder="Pesan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                @foreach ($order as $data)
                    <p>{{ $data->invoice }}</p>
                    <form action="{{ route('store.wa') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
