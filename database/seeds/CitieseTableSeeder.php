<?php

use App\City;
use Illuminate\Database\Seeder;

class CitieseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'id' => 1,
               'city_name' => 'Киев',
            ],
            [
                'id' => 2,
                'city_name' => 'Одесса',
            ],
            [
                'id' => 3,
                'city_name' => 'Чоп',
            ],
            [
                'id' => 4,
                'city_name' => 'Белая Церковь',
            ],
            [
                'id' => 5,
                'city_name' => 'Тернополь',
            ],
        ];

        City::insert($cities);
    }
}
