<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypolgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies =
            [
                'Africano',
                'Americano',
                'Asiatico',
                'Caffetteria',
                'Cinese',
                'Coreano',
                'Dolci e dessert',
                'Gelato',
                'Giapponese',
                'Hamburger',
                'Indiano',
                'Insalate',
                'Italiano',
                'Kebab',
                'Mediterraneo',
                'Messicano',
                'Pasta',
                'Pizza',
                'Poke',
                'Sushi',
                'Thailandese',
            ];
        foreach ($typologies as $typology) {
            $newtypology = new Typology;
            $newtypology->name = $typology;
            $newtypology->save();
        }
    }
}
