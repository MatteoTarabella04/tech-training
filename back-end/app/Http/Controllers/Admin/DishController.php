<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Dish;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function index()
    {
        $restaurant = Auth::user()->restaurant->id;

        $dishes = Dish::where('restaurant_id', $restaurant)->get();
        //dd($dishes);

        return view('admin.dishes.index', compact('dishes'));
    }

    public function create()
    {
        return view('admin.dishes.create');
    }

    public function store(StoreDishRequest $request)
    {
        // USED TO RETRIEVE NEXT ID THAT WILL BE USED
        /* $statement = DB::select("SHOW TABLE STATUS LIKE 'dishes'");
        $nextId = $statement[0]->Auto_increment; */

        $val_data = $request->validated();

        $val_data["restaurant_id"] = Auth::user()->restaurant->id;

        if (!$request->has("visible")) {
            $val_data["visible"] = 0;
        }

        $newDish = Dish::create($val_data);

        return view("admin.dishes.index")->with("message", "Nuovo Piatto aggiunto");



    }

    public function show(Dish $dish)
    {
        //$restaurant = Auth::user()->restaurant()->get();
        return view('admin.dishes.show', compact('dish', 'restaurant'));
    }

    public function edit(Dish $dish)
    {

        return view('admin.dishes.edit', compact('dish'));


    }

    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $val_data = $request->validated();

        if (!$request->has("visible")) {
            $val_data["visible"] = 0;
        }

        $dish->update($val_data);

        return view("admin.dishes.index")->with("message", $dish->name . ": modificatto correttamente!");
    }

    public function destroy(Dish $dish)
    {

        //$dish->restaurant()->sync([]);
        $dish->delete();

        return view('admin.dishes.index')->with('message', 'Piatto rimosso');
    }
}
