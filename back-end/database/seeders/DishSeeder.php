<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config("dishes");
        foreach ($dishes as $dish) {
            $newDish = new Dish;
            $newDish->name = $dish['name'];
            $newDish->description = $dish['description'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->visible = $dish['visible'];
            $newDish->price = $dish['price'];
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->save();
        }
        foreach ($dishes as $dish) {
            $newDish = new Dish;
            $newDish->fill($dish);
            $newDish->save();
        }
    }
}
