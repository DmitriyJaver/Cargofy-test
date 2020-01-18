<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => 1,
                'name' => Str::random(10),
            ],
            [
                'id' => 2,
                'name' => Str::random(10),
            ],
            [
                'id' => 3,
                'name' => Str::random(10),
            ],
            [
                'id' => 4,
                'name' => Str::random(10),
            ],

        ]);
    }
}
