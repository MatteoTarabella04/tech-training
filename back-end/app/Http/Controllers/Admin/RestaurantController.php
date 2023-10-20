<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Dish;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->getId();
        }
        $restaurants = Restaurant::all();
        $typologies = Typology::all();
        $dishes = Dish::all();
        return view('admin.restaurants.index', compact('restaurants', 'id', 'typologies', 'dishes'));
    }

    public function create()
    {
        $typologies = Typology::all();
        $dishes = Dish::all();
        return view('admin.restaurants.create', compact('typologies', 'dishes'));
    }

    public function store(StoreRestaurantRequest $request)
    {

        //

    }

    public function show(Restaurant $restaurant)
    {
        $typologies = Typology::all();
        $dishes = Dish::all();
        return view('admin.restaurants.show', compact('restaurant', 'typologies', 'dishes'));
    }

    public function edit(Restaurant $restaurant)
    {
        $typologies = Typology::all();
        $dishes = Dish::all();
        return view('admin.restaurants.edit', compact('restaurant', 'typologies', 'dishes'));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    public function destroy(Restaurant $restaurant)
    {

        //$restaurant->dishes()->sync([]);
        $restaurant->typologies()->sync([]);
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('message', 'Restaurant Deleted');
    }

}
