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

                    <form method="POST" action="{{ route('submit-sale') }}">
                        @csrf
                        <div class="flex justify-between my-5">
                            <div class="flex flex-col w-full">
                                <h1 class="text-2xl font-bold mb-3">Car Details</h1>
                                <x-input-label class="my-1">Car ID</x-input-label>
                                <x-text-input class="mb-2" name="inventoryId" vals="{{ $invOutput->value('id') }}" readonly></x-text-input>
                                <x-input-label class="my-1">Year</x-input-label>
                                <x-text-input class="mb-2" name="year" vals="{{ $invOutput->value('year') }}" readonly></x-text-input>
                                <x-input-label class="my-1">Make</x-input-label>
                                <x-text-input class="mb-2" name="make" vals="{{ $invOutput->value('make') }}" readonly></x-text-input>
                                <x-input-label class="my-1">Model</x-input-label>
                                <x-text-input class="mb-2" name="model" vals="{{ $invOutput->value('model') }}" readonly></x-text-input>
                                <hr class="my-6">
                                <h1 class="text-2xl font-bold mb-3">Pricing</h1>
                                <x-input-label class="my-1">List Price</x-input-label>
                                <x-text-input class="mb-2" name="listPrice" vals="{{ $invOutput->value('price') }}" readonly></x-text-input>
                                <x-input-label class="my-1">Agreed Price</x-input-label>
                                <x-text-input class="mb-2" name="agreedPrice"></x-text-input>
                                <hr class="my-6">
                                <h1 class="text-2xl font-bold mb-3">Salesperson Details</h1>
                                <x-input-label class="my-1">Name</x-input-label>
                                <x-text-input class="mb-2" name="salespersonName" vals="{{Auth::user()->name}}" readonly></x-text-input>
                                <x-input-label class="my-1">Salesperson ID</x-input-label>
                                <x-text-input class="mb-2" name="salespersonId" vals="{{Auth::user()->id}}" readonly></x-text-input>
                            </div>

                            <div class="border-[0.5px] mx-8 my-6"></div>

                            <div class="flex flex-col w-full">
                                <h1 class="text-2xl font-bold mb-3">Buyer Details</h1>
                                <x-input-label class="my-1">First Name</x-input-label>
                                <x-text-input class="mb-2" name="customerFName"></x-text-input>
                                <x-input-label class="my-1">Last Name</x-input-label>
                                <x-text-input class="mb-2" name="customerLName"></x-text-input>
                                <x-input-label class="my-1">Contact Number</x-input-label>
                                <x-text-input class="mb-2" name="customerPhone"></x-text-input>
                                <x-input-label class="my-1">Address</x-input-label>
                                <x-text-input class="mb-2" name="customerAddress"></x-text-input>
                                <x-input-label class="my-1">E-mail</x-input-label>
                                <x-text-input class="mb-2" name="customerEmail"></x-text-input>
                                <hr class="my-6">
                                <h1 class="text-2xl font-bold mb-3">Payment Details</h1>
                                <select name="paymentOption" id="paymentOption" class="rounded-[10px] text-black ">
                                    <option value="" selected disabled>Select One</option>
                                    <option value="full">Full Payment</option>
                                </select>

                            </div>
                        </div>

                        <x-primary-button>Submit</x-primary-button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
