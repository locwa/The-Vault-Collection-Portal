<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="h-[50vh] my-8 mx-48 p-12 bg-white dark:bg-[#1f1f1f] rounded-[10px] text-black dark:text-gray-200">
        <h2 class="text-2xl font-semibold">Sales List</h2>
        <table class="table-auto my-6 w-full text-left">
            <tr class="border-b">
                <th class="py-3 pl-3">Car Id</th>
                <th class="py-3">Year</th>
                <th class="py-3">Make</th>
                <th class="py-3">Model</th>
                <th class="py-3">List Price</th>
                <th class="py-3">Agreed Price</th>
                <th class="py-3">Sold At</th>
            </tr>
            @foreach($userSales as $index => $sales)
                @if($index == 0 || ($index/2) == 0)
                    <tr class="border-b  bg-[#9f9f9f] dark:bg-[#3f3f3f]">
                        <td class="py-3 pl-3">{{ $sales->inventory_id }}</td>
                        <td class="py-3">{{ $sales->year }}</td>
                        <td class="py-3">{{ $sales->make }}</td>
                        <td class="py-3">{{ $sales->model }}</td>
                        <td class="py-3">{{ $sales->price }}</td>
                        <td class="py-3">{{ $sales->agreed_price }}</td>
                        <td class="py-3">{{ date('Y-m-d h:m:s',  strtotime($sales->created_at)) . " UTC" }}</td>
                        <td>
                            <a href="{{ route('transaction-details', $sales->inventory_id) }}">
                                <x-primary-button>View Details</x-primary-button>
                            </a>
                        </td>
                    </tr>
                @else
                    <tr class="border-b">
                        <td class="py-3 pl-3">{{ $sales->inventory_id }}</td>
                        <td class="py-3">{{ $sales->year }}</td>
                        <td class="py-3">{{ $sales->make }}</td>
                        <td class="py-3">{{ $sales->model }}</td>
                        <td class="py-3">{{ $sales->price }}</td>
                        <td class="py-3">{{ $sales->agreed_price }}</td>
                        <td class="py-3">{{ date('Y-m-d h:m:s',  strtotime($sales->created_at)) . " UTC" }}</td>
                        <td>
                            <a href="{{ route('transaction-details', $sales->inventory_id) }}">
                                <x-primary-button>View Details</x-primary-button>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
</x-app-layout>
