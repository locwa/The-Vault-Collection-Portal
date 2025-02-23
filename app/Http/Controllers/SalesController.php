<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Sales;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // View the car to be sold and the form to be filled out with the details of the buyer
    public function sellForm(int $id){
        $inventoryOutput = Inventory::where('id', $id)->get();
        $carDetails = sprintf("%s %s %s", $inventoryOutput[0]->year, $inventoryOutput[0]->make, $inventoryOutput[0]->model);
        $price = $inventoryOutput[0]->price;
        $photoHeader = $inventoryOutput[0]->photo_header;
        return view('inventory.sell-car',
            ['carDetails' => $carDetails],
            ['invOutput' => $inventoryOutput],
        );
    }

    // Classify the car as sold and record the sale
    public function sellCar(Request $request) : RedirectResponse {

        $request->validate([
            'inventoryId' => 'required',
            'salespersonId' => 'required',
            'agreedPrice' => 'required',
            'customerFName' => 'required',
            'customerLName' => 'required',
            'customerAddress' => 'required',
            'customerPhone' => 'required',
            'customerEmail' => 'required',
            'paymentOption' => 'required',
        ]);

        Sales::create([
            'inventory_id' => $request->inventoryId,
            'user_id' => $request->salespersonId,
            'agreed_price' => $request->agreedPrice,
            'first_name' => $request->customerFName,
            'last_name' => $request->customerLName,
            'phone' => $request->customerPhone,
            'address' => $request->customerAddress,
            'email' => $request->customeEmail,
            'payment_type' => $request->paymentOption,
        ]);

        Inventory::where('id', $request->inventoryId)->update([
            'status' => 1
        ]);

        return redirect(route('inventory'));
    }
}
