<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;

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
        return view('admin.restaurants.index', compact('restaurants', 'id'));
    }

    public function create()
    {
        return view('admin.restaurants.create');
    }

    public function store(StoreRestaurantRequest $request)
    {

        //

    }

    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    public function destroy(Restaurant $restaurant)
    {

        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('message', 'Restaurant Deleted');
    }

}
