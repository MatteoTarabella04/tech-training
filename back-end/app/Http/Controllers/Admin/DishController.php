<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Dish;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->getId();
        }
        $restaurants = Restaurant::all();
        $dishes = Dish::all();
        return view('admin.dish.index', compact('restaurants', 'id', 'dishes'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.dish.create', compact('restaurants'));
    }

    public function store(StoreDishRequest $request)
    {

        //

    }

    public function show(Dish $dish)
    {
        $restaurants = Restaurant::all();
        return view('admin.dish.show', compact('dish', 'restaurant'));
    }

    public function edit(Dish $dish)
    {
        $restaurants = Restaurant::all();
        return view('admin.dish.edit', compact('dish', 'restaurant'));
    }

    public function update(UpdateDishRequest $request, Dish $dish)
    {
        //
    }

    public function destroy(Dish $dish)
    {

        //$dish->restaurant()->sync([]);
        $dish->delete();

        return redirect()->route('admin.dish.index')->with('message', 'Dish Deleted');
    }
}
