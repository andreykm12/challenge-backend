<?php

use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 10; $i++ ) {
            $data[] = [
                'guid'    => Str::random(10),
                'suburb'  => $faker->city,
                'state'   => $faker->state,
                'country' => $faker->country,
            ];
        }

        DB::table('properties')->insert($data);
    }
}
