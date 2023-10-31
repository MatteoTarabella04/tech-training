<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Typology;
use App\Models\Dish;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->getId();
        }

        $restaurant = Restaurant::where('user_id', $id)->first();

        //var_dump($restaurant);

        return view('admin.restaurant.index', compact('restaurant'));
    }

    public function create()
    {
        $typologies = Typology::all();

        return view('admin.restaurant.create', compact('typologies'));
    }

    public function store(StoreRestaurantRequest $request, Restaurant $restaurant)
    {

        // USED TO RETRIEVE NEXT ID THAT WILL BE USED
        /* $statement = DB::select("SHOW TABLE STATUS LIKE 'restaurant'");
        $nextId = $statement[0]->Auto_increment; */

        $val_data = $request->validated();

        $val_data["user_id"] = Auth::id();

        if ($request->hasFile("photo")) {
            $photoPath = Storage::put("uploads", $val_data["photo"]);
            $val_data["photo"] = $photoPath;
        }

        $newRestaurant = Restaurant::create($val_data);

        if ($request->has('typologies')) {
            $newRestaurant->typologies()->attach($request->typologies);
        }

        return view("admin.restaurant.index")->with("message", "Nuovo Ristorante aggiunto");
    }

    public function show(Restaurant $restaurant)
    {
        $typologies = Typology::all();

        return view('admin.restaurant.show', compact('restaurant'));
    }

    public function edit(Restaurant $restaurant)
    {
        $typologies = Typology::all();

        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $val_data = $request->validated();

        if ($request->hasFile("photo")) {
            if ($restaurant->photo) {
                Storage::delete($restaurant->photo);
            }
            $photoPath = Storage::put("uploads", $val_data["photo"]);
            $val_data["photo"] = $photoPath;
        } else {
            $val_data["photo"] = $restaurant->photo;
        }

        $restaurant->update($val_data);

        if ($request->has('typologies')) {
            $restaurant->typologies()->attach($request->typologies);
        }

        return view('admin.restaurant.show', $restaurant->id)->with("message", "Modifiche apportate con successo");


    }

    public function destroy(Restaurant $restaurant)
    {

        //$restaurant->dishes()->sync([]);
        $restaurant->typologies()->sync([]);
        $restaurant->delete();

        return redirect()->route('admin.restaurant.index')->with('message', 'Restaurant Deleted');
    }

}
