<?php

use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnalyticTypeSeeder extends Seeder
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
                'name'              => $faker->name,
                'units'             => Str::random(10),
                'is_numeric'        => rand(0, 1),
                'num_decimal_place' => Str::random(10),
            ];
        }

        DB::table('analytic_types')->insert($data);
    }
}
