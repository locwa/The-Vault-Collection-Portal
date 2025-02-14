<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    // Handles incoming car addition request
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'price' => 'required',
            'mileage' => 'required',
            'description' => 'required',
        ]);

        $newCar = Inventory::create([
           'make' => $request->make,
           'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'description' => $request->description
        ]);

        Inventory::where('id' , $newCar->id)->update([
            'photo_header' => $newCar->id . "-" . request('make') . "-" . request('year') . "-" . str_replace(' ', '-', request('model')) . "-",
        ]);

        return redirect(route('inventory'));

    }

    // View all cars in the database
    public function viewAll(){
        $inventory = Inventory::all();
        return view('inventory.inventory', ['inventory' => $inventory]);
    }

    // View specific car
    public function viewCar(int $id){
        $carDetails = Inventory::where('id', $id)->get();
        return view('inventory.view-car', ['carDetails' => $carDetails]);
    }
}
