<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Car') }}
            </h2>
            <a href="{{ route('inventory') }}">
                <x-primary-button>Back to Fleet</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="./add_car" class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg" enctype="multipart/form-data">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @csrf

                    <div class="mb-6">
                        <x-input-label>Make</x-input-label>
                        <x-text-input name='make' class="mt-1 block w-full">e.g, Ferrari</x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Model</x-input-label>
                        <x-text-input name='model' class="mt-1 block w-full">e.g, 250 GTO</x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Year</x-input-label>
                        <x-text-input name='year' class="mt-1 block w-full">e.g, 2000</x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Rent Price</x-input-label>
                        <x-text-input name='rent_price' class="mt-1 block w-full">e.g, 2500</x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Description</x-input-label>
                        <x-textarea></x-textarea>
                    </div>

                    <!--
                    <div class="mb-6">
                        <x-image-input></x-image-input>
                    </div>
                    -->
                    <x-primary-button>Add</x-primary-button>

                </div>
            </form>
        </div>
    </div>

</x-app-layout>
