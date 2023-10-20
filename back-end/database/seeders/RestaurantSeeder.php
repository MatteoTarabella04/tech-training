<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        /* ristorante 1 Pasta, Italiano, Insalate */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 1;
        $newRestaurant->name = "Al Matarel Pasta Fresca";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 2 Pizza */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 2;
        $newRestaurant->name = "Pizzeria Lillo";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 3 Giapponese, Cinese, Asiatico, Sushi */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 3;
        $newRestaurant->name = "Sushi Go";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 4 Gelato, Dolci e Dessert */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 4;
        $newRestaurant->name = "Crema Pasticciona";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();
        /* ristorante 5 Kebab, Hamburger */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 5;
        $newRestaurant->name = "Shock Burger & Kebab";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 6 Messicano */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 6;
        $newRestaurant->name = "Quezal";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 7 Mediterraneo, Italiano */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 7;
        $newRestaurant->name = "La vela";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 8 Americano, Hamburger */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 8;
        $newRestaurant->name = "American bully";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 9 Africano, Caffetteria*/
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 9;
        $newRestaurant->name = "African Food and Drinks";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

        /* ristorante 10 Thai, Indiano */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 10;
        $newRestaurant->name = "Tikka Thai";
        $newRestaurant->address = $faker->address();
        $newRestaurant->piva = $faker->iban('IT');
        $newRestaurant->photo = "https://picsum.photos/400/400";
        $newRestaurant->save();

    }
}
