<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_typology')->insert(
            array(
                array('restaurant_id' => 1, 'typology_id' => 12),
                array('restaurant_id' => 1, 'typology_id' => 13),
                array('restaurant_id' => 1, 'typology_id' => 17),
                array('restaurant_id' => 2, 'typology_id' => 18),
                array('restaurant_id' => 3, 'typology_id' => 3),
                array('restaurant_id' => 3, 'typology_id' => 5),
                array('restaurant_id' => 3, 'typology_id' => 6),
                array('restaurant_id' => 3, 'typology_id' => 9),
                array('restaurant_id' => 3, 'typology_id' => 20),
                array('restaurant_id' => 4, 'typology_id' => 7),
                array('restaurant_id' => 4, 'typology_id' => 8),
                array('restaurant_id' => 5, 'typology_id' => 10),
                array('restaurant_id' => 5, 'typology_id' => 14),
                array('restaurant_id' => 6, 'typology_id' => 16),
                array('restaurant_id' => 7, 'typology_id' => 13),
                array('restaurant_id' => 7, 'typology_id' => 15),
                array('restaurant_id' => 8, 'typology_id' => 2),
                array('restaurant_id' => 8, 'typology_id' => 10),
                array('restaurant_id' => 9, 'typology_id' => 1),
                array('restaurant_id' => 9, 'typology_id' => 4),
                array('restaurant_id' => 10, 'typology_id' => 11),
                array('restaurant_id' => 10, 'typology_id' => 20),
            )
        );
    }
}
