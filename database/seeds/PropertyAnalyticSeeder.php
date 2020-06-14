<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyAnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($propertyId = 1; $propertyId < 10; $propertyId++) {
            for ($analyticTypeId = 1; $analyticTypeId < 10; $analyticTypeId++) {
                $data[] = [
                    'property_id'      => $propertyId,
                    'analytic_type_id' => $analyticTypeId,
                    'value'            => rand(0, 10),
                ];
            }
        }

        DB::table('property_analytics')->insert($data);
    }
}
