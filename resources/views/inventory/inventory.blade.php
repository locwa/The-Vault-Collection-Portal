<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </x-slot>

    <div class="px-12 flex flex-col items-center mx-14">
        <div class="w-full pt-12">
            <div class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 w-full text-right">
                    <a href="{{ route('add-car') }}">
                        <x-primary-button>Add Car</x-primary-button>
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full h-[100vh] mt-12 flex justify-between gap-10">
            <div class="h-[90vh] w-96 bg-gray-300 dark:bg-[#1f1f1f] rounded"></div>
            <div class="flex flex-wrap gap-5">
                <div class="h-80 w-72 dark:bg-[#1f1f1f] rounded"></div>
                <div class="h-80 w-72 dark:bg-[#1f1f1f] rounded"></div>
                <div class="h-80 w-72 dark:bg-[#1f1f1f] rounded"></div>
                <div class="h-80 w-72 dark:bg-[#1f1f1f] rounded"></div>
                <div class="h-80 w-72 dark:bg-[#1f1f1f] rounded"></div>
            </div>
        </div>

    </div>

</x-app-layout>
