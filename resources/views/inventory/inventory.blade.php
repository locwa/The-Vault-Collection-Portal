<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="px-12 flex flex-col items-center mx-14 gap-10">

        <div class="w-full min-h-[100vh] my-12 flex gap-10">
            <div class="h-[70vh] w-96 bg-gray-300 dark:bg-[#1f1f1f] rounded flex flex-col items-center p-5">
                <div class="w-full">
                    <a href="{{ route('add-car') }}" class="flex justify-center mb-4">
                        <x-primary-button class="px-20 py-3 w-full justify-center">Add Car</x-primary-button>
                    </a>
                    <a href="{{ route('inventory') }}" class="flex justify-center">
                        <x-primary-button class="px-20 py-3 w-full justify-center">Reset Search</x-primary-button>
                    </a>
                    <hr class="dark:border-gray-100 my-3">
                    <form action="{{ route('inventory') }}" method="get" >
                        <div class="flex flex-col">
                            <label for="id" class="text-[#0f0f0f] dark:text-gray-100 font-semibold">Car ID:</label>
                            <input type="text" name="car-id" id="carID" class="w-24 rounded-[10px]" value="{{ request()->query('car-id') }}">
                        </div>
                        <div class="flex flex-col">
                            <label for="id" class="text-[#0f0f0f] dark:text-gray-100 font-semibold">Status:</label>
                            <select name="status" id="status" class="rounded-[10px]">
                                <option value="">Select One</option>
                                <option value="0" {{ request()->query('status') ? "" : "selected" }}>Available</option>
                                <option value="1" {{ request()->query('status') ? "selected" : "" }}>Sold</option>
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="id" class="text-[#0f0f0f] dark:text-gray-100 font-semibold">Make:</label>
                            <select name="make" id="make" class="rounded-[10px]">
                                <option value="">Select One</option>
                                @foreach($makes as $make)
                                    <option value="{{ $make->make }}" {{ $make->make == request()->query('make') ? "selected" : "" }}>{{ $make->make }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="id" class="text-[#0f0f0f] dark:text-gray-100 font-semibold">Model:</label>
                            <select name="model" id="model" class="rounded-[10px]">
                                <option value="">Select One</option>
                                @foreach($models as $model)
                                    <option value="{{ $model->model }}" {{ $model->model == request()->query('model') ? "selected" : "" }}>{{ $model->model }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="id" class="text-[#0f0f0f] dark:text-gray-100 font-semibold">Year:</label>
                            <input type="text" name="year" id="year" class="rounded-[10px]" value="{{ request()->query('year') }}">
                        </div>
                        <x-primary-button class="h-full mt-8">Search</x-primary-button>
                    </form>
                    <hr class="dark:border-gray-100 my-3">
                </div>
            </div>

                @if($inventory->total() > 0)
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
                                @if($inv->status)
                                    <a href="{{ route('transaction-details', $inv->id) }}">
                                        <x-secondary-button>Transaction Details</x-secondary-button>
                                    </a>
                                @else
                                    <a href="{{ route('sell-car', $inv->id) }}">
                                        <x-secondary-button>Sell Car</x-secondary-button>
                                    </a>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
                @else
                    <div class="flex flex-col w-full">
                        <p class="text-xl dark:text-white text-center w-full">Sorry, It seems like that {{ request()->query('year') . " " . request()->query('make') . " " . request()->query('model') . " does not exist in your database"  }}</p>
                        <p class="text-md text-gray-500 text-center">Please try another combination</p>
                    </div>
                @endif

        </div>
        <div class="flex">
            {{ $inventory->links() }}
        </div>
    </div>

</x-app-layout>
