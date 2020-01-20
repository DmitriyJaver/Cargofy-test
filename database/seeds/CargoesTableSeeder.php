<?php

use App\Cargo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargoes = [
            [
                'id' => 1,
                'name' => 'Макароны',
                'weight' => '32',
                'from_city_id' => 1,
                'to_city_id' => 2,
                'delivery_date' => Carbon::now(),

            ],
            [
                'id' => 2,
                'name' => 'Патроны',
                'weight' => '12',
                'from_city_id' => 2,
                'to_city_id' => 1,
                'delivery_date' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Колбаса',
                'weight' => '1',
                'from_city_id' => 3,
                'to_city_id' => 2,
                'delivery_date' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Айфоны',
                'weight' => '88',
                'from_city_id' => 4,
                'to_city_id' => 3,
                'delivery_date' => Carbon::now(),
            ],
        ];
        Cargo::insert($cargoes);
    }
}
