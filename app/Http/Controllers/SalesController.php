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
        if ($inventoryOutput[0]->status == 0){
            $carDetails = sprintf("%s %s %s", $inventoryOutput[0]->year, $inventoryOutput[0]->make, $inventoryOutput[0]->model);
            $price = $inventoryOutput[0]->price;
            $photoHeader = $inventoryOutput[0]->photo_header;
            return view('inventory.sell-car',
                ['carDetails' => $carDetails],
                ['invOutput' => $inventoryOutput],
            );
        } else {
            return view('inventory.view.car', $id);
        }
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
            'email' => $request->customerEmail,
            'payment_type' => $request->paymentOption,
        ]);

        Inventory::where('id', $request->inventoryId)->update([
            'status' => 1
        ]);

        return redirect(route('inventory'));
    }

    // Retrieves transaction details and views the transaction details page
    public function transactionDetails(int $id){
        $carDetails = Sales::where('inventory_id', $id)
            ->join('inventory', 'inventory.id', '=', 'sales.inventory_id')
            ->join('users', 'users.id' , '=', 'sales.user_id')
            ->select('users.name AS salesperson_name', 'users.id AS salesperson_id', 'inventory.year', 'inventory.make', 'inventory.model', 'inventory.price', 'inventory.mileage', 'inventory.photo_header', 'inventory.photo_count', 'inventory.status', 'sales.*')
            ->get();

        $time = date('Y-m-d h:m:s',  strtotime($carDetails[0]->created_at));
        return view('inventory.transaction-details', ['carDetails' => $carDetails, 'time' => $time]);
    }

    // Retrieves user sales data
    public function salesSummary(int $id){
        $userSales = Sales::where('user_id', $id)
            ->join('inventory', 'inventory.id', '=', 'sales.inventory_id')
            ->join('users', 'users.id' , '=', 'sales.user_id')
            ->select('inventory.year', 'inventory.make', 'inventory.model', 'sales.*')
            ->get();

        return view('sales', ['userSales' => $userSales]);
    }
}
