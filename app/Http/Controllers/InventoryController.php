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

    // Updates the inventory
    public function update(Request $request, int $id) : RedirectResponse {
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

        Inventory::where('id' , $id)->update([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'price' => $request->price,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'is_poa' => $isPoa,
        ]);

        return redirect(route('view-car', $id));
    }

    // View all cars in the database
    public function viewList(){

        $inventory = [];
        request()->query('car-id') ? array_push($inventory, ['id', request()->query('car-id')]) : "";
        request()->query('make') ? array_push($inventory, ['make', request()->query('make')]) : "";
        request()->query('model') ? array_push($inventory, ['model', request()->query('model')]) : "";
        request()->query('year') ? array_push($inventory, ['year', request()->query('year')]) : "";
        request()->query('status') ? array_push($inventory, ['status', 1]) : array_push($inventory, ['status', 0]);

        $makes = Inventory::select('make')->distinct()->get();
        $models = Inventory::select('model')->distinct()->get();

        if (count($inventory) == 0){
            $inventory = Inventory::paginate(12);

        } else {
            $inventory = Inventory::where($inventory)->paginate(12);
        }

        return view('inventory.inventory', ['inventory' => $inventory, 'makes' => $makes, 'models' => $models]);
    }

    // View specific car
    public function viewCar(int $id){
        $carDetails = Inventory::where('id', $id)->get();
        return view('inventory.view-car', ['carDetails' => $carDetails]);
    }

    // Go to edit car page with the values
    public function viewEdit(int $id){
        $carDetails = Inventory::where('id', $id)->get();
        return view('inventory.edit-car', ['carDetails' => $carDetails]);
    }

}
