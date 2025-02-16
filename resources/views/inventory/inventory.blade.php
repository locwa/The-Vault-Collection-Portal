<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="px-12 flex flex-col items-center mx-14 gap-10">
        <div class="w-full pt-12">
            <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full text-right">
                    <a href="{{ route('add-car') }}">
                        <x-primary-button>Add Car</x-primary-button>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full min-h-[100vh] my-12 flex gap-10">
            <div class="h-[90vh] w-96 bg-gray-300 dark:bg-[#1f1f1f] rounded"></div>
            <div class="grid grid-cols-3 gap-5">
                @foreach($inventory as $inv)
                    <div class="h-[55vh] w-[20vw] bg-gray-300 dark:bg-[#1f1f1f] rounded dark:text-gray-100 rounded p-3">
                        <img class="mb-4" src="./storage/cars/{{ $inv->photo_header }}0.jpg" alt="car photo">
                        <div class="flex justify-between items-center gap-5">
                            <div>
                                <h4 class="text-md font-light leading-[1rem]">{{ $inv->year }}</h4>
                                <h2 class="text-2xl font-semibold leading-[2rem]">{{ $inv->make }}</h2>
                                <h4 class="text-lg font-light leading-[1rem]">{{ $inv->model }}</h4>
                            </div>
                            <div class="text-right">
                                <p class="text-sm">ID: {{ $inv->id }}</p>
                                <p class="text-sm">Status: {{ $inv->status ? "Sold" : "Available" }}</p>
                            </div>
                        </div>

                        <div class="py-5">
                            <p class="font-light">List Price:</p>
                            <h3 class="text-2xl font-semibold">{{ numfmt_format_currency(numfmt_create('en_US', NumberFormatter::CURRENCY), $inv->price, "USD") }}</h3>
                        </div>

                        <hr class="border-black dark:border-gray-100">

                        <div class="flex my-3 gap-x-3">
                            <a href="{{ route('view-car', $inv->id) }}">
                                <x-primary-button>View Car</x-primary-button>
                            </a>
                            <x-secondary-button>Sell Car</x-secondary-button>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
        <div class="flex">
            {{ $inventory->links() }}
        </div>
    </div>

</x-app-layout>
