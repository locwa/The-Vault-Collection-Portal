<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Car') }}
            </h2>
            <div class="flex justify-end gap-x-5">
                <a href="{{ route('edit-car', $carDetails->value('id')) }}">
                    <x-primary-button>Edit Car</x-primary-button>
                </a>
                <a href="{{ route('inventory') }}">
                    <x-secondary-button>Back to Fleet</x-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pb-1 pt-6 text-gray-900 dark:text-gray-100">

                    <x-image-carousel photoFileHeader="{{$carDetails->value('photo_header')}}" photoCount="{{$carDetails->value('photo_count')}}" carInfo="car">
                        <x-slot:heading>
                            <div>
                                <h3 class="text-xl">{{ $carDetails->value('make') }}</h3>
                                <h1 class="text-4xl font-bold"> {{ $carDetails->value('model') }}</h1>
                                <h4 class="text-lg">{{ $carDetails->value('year') }}</h4>
                            </div>
                        </x-slot:heading>
                        <x-slot:details>
                            <div class="text-right mr-5">
                                <h4 class="text-lg"><strong>ID:</strong> {{ $carDetails->value('inventory_id') }}</h4>
                                <h4 class="text-lg"><strong>Status:</strong> {{ $carDetails->value('status') ? "Sold" : "Available" }}</h4>
                            </div>
                        </x-slot:details>
                    </x-image-carousel>

                    <hr>

                    <div class="my-5">
                        <h1 class="text-4xl font-bold mb-4">Buyer Details:</h1>
                        <table class="table-auto text-left w-full">
                            <thead class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                <tr>
                                    <th class="pl-6 pr-8 py-4">Row Name</th>
                                    <th class="pl-6 pr-8 py-4">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Customer Name</td>
                                    <td class="px-6 pr-8 py-4">{{ $carDetails->value('first_name') . " " . $carDetails->value('last_name') }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Customer Email</td>
                                    <td class="px-6 pr-8 py-4">{{ $carDetails->value('email') }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Customer Address</td>
                                    <td class="px-6 pr-8 py-4">{{ $carDetails->value('address') }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">List Price</td>
                                    <td class="px-6 pr-8 py-4">{{ numfmt_format_currency(numfmt_create('en_US', NumberFormatter::CURRENCY), $carDetails->value('price'),"USD") }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Agreed Price</td>
                                    <td class="px-6 pr-8 py-4">{{ numfmt_format_currency(numfmt_create('en_US', NumberFormatter::CURRENCY), $carDetails->value('agreed_price'),"USD") }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Payment Type</td>
                                    <td class="px-6 pr-8 py-4">{{ $carDetails->value('payment_type') }}</td>
                                </tr>
                                <tr class=" border-[#1f1f1f] dark:border-gray-100 border-b">
                                    <td class="px-6 pr-8 py-4">Sold At</td>
                                    <td class="px-6 pr-8 py-4">{{ $time . " UTC" }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
