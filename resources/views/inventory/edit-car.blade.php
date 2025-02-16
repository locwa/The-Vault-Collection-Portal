<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Car') }}
            </h2>
            <a href="{{ route('inventory') }}">
                <x-primary-button>Back to Fleet</x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('edit-car', $carDetails->value('id')) }}" class="bg-white dark:bg-[#1f1f1f] overflow-hidden shadow-sm sm:rounded-lg" enctype="multipart/form-data">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @csrf

                    <div class="mb-6">
                        <x-input-label>Make</x-input-label>
                        <x-text-input name='make' class="mt-1 block w-full" value="{{$carDetails->value('make')}}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Model</x-input-label>
                        <x-text-input name='model' class="mt-1 block w-full" value="{{$carDetails->value('model')}}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Year</x-input-label>
                        <x-text-input name='year' class="mt-1 block w-full" value="{{$carDetails->value('year')}}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Price</x-input-label>
                        <x-text-input name='price' class="mt-1 block w-full" value="{{$carDetails->value('price')}}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Mileage (KM)</x-input-label>
                        <x-text-input name='mileage' class="mt-1 block w-full" value="{{$carDetails->value('mileage')}}"></x-text-input>
                    </div>

                    <div class="mb-6">
                        <x-input-label>Description</x-input-label>
                        <x-textarea>{{$carDetails->value('description')}}</x-textarea>
                    </div>

                    <div class="mb-6 flex gap-4">
                        <x-input-label>Is it Price on Application</x-input-label>
                        <input type="checkbox" name="isPoa" {{$carDetails->value('is_poa')? "checked" : ""}}>
                    </div>

                    <x-primary-button>Edit Car</x-primary-button>

                </div>
            </form>
        </div>
    </div>

</x-app-layout>
