<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Car') }}
            </h2>
            <a href="{{ route('inventory') }}">
                <x-primary-button>Back to Fleet</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Header -->
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-xl">{{ $carDetails->value('make') }}</h3>
                            <h1 class="text-4xl font-bold"> {{ $carDetails->value('model') }}</h1>
                            <h4 class="text-lg">{{ $carDetails->value('year') }}</h4>
                        </div>
                        <div class="text-right">
                            <h4 class="text-lg"><strong>ID:</strong> {{ $carDetails->value('id') }}</h4>
                            <h4 class="text-lg"><strong>Status:</strong> {{ $carDetails->value('status') ? "Sold" : "Available" }}</h4>
                            <h4 class="text-lg"><strong>Price:</strong> {{ numfmt_format_currency(numfmt_create('en_US', NumberFormatter::CURRENCY), $carDetails->value('price'),"USD") }}</h4>
                        </div>
                    </div>
                </div>

                <hr>

                <h1 class="m-6 font-bold text-gray-900 dark:text-gray-100 text-4xl">Description:</h1>
                <div class="m-6 text-gray-900 dark:text-gray-100 whitespace-pre-wrap">{!! $carDetails->value('description') !!}</div>
            </div>
        </div>
    </div>

</x-app-layout>
