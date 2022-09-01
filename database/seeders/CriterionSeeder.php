<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criteria')->insert([
            [
                'criteria_name' => 'Growt Rate',
                'criteria_attribute' => 'Benefit',
            ],
            [
                'criteria_name' => 'Light Demand',
                'criteria_attribute' => 'Cost',
            ],
            [
                'criteria_name' => 'CO2 Demand',
                'criteria_attribute' => 'Cost',
            ],
            [
                'criteria_name' => 'Water Hardness Tolerance',
                'criteria_attribute' => 'Benefit',
            ],
            [
                'criteria_name' => 'Demands',
                'criteria_attribute' => 'Cost',
            ],
            [
                'criteria_name' => 'Temperature',
                'criteria_attribute' => 'Benefit',
            ],
        ]);
    }
}
