<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sell Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-semibold">{{ $carDetails }}</h1>

                    <hr class="my-3">

                    <img src="../storage/cars/{{ $invOutput->value('photo_header') . '0.'. "jpg" }}" class="h-96 my-4" alt="">

                    <hr class="my-3">


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
