<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Storage;

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


        $isPoa = "";

        $request->exists('isPoa') ? $isPoa = 1 : $isPoa = 0;


        $newCar = Inventory::create([
           'make' => $request->make,
           'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'is_poa' => $isPoa,
        ]);

        $files = $request->file('imageInput');
        $id = $newCar->id;

        Inventory::where('id' , $newCar->id)->update([
            'photo_header' => $newCar->id . "-" . request('make') . "-" . request('year') . "-" . str_replace(' ', '-', request('model')) . "-",
            'photo_count' => count($files),
        ]);

        if (count($files) > 0){
            for ($i = 0; $i < count($files); $i++) {
                Storage::disk('public')->putFileAs('cars', $files[$i], $id . "-" . request('make') . "-" . request('year') . "-" . str_replace(' ', '-', request('model')) . "-" . $i . ".jpg", "public");
            }
        }

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
