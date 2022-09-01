<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcriterionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcriteria')->insert([
            [
                'criteria_id' => 1,
                'subcriteria_name' => 'Slow',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 1,
                'subcriteria_name' => 'Medium',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 1,
                'subcriteria_name' => 'Fast',
                'weight_value' => 6,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'Low',
                'weight_value' => 1,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'Low - Medium',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'Medium',
                'weight_value' => 3,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'Medium - High',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'High',
                'weight_value' => 5,
            ],
            [
                'criteria_id' => 2,
                'subcriteria_name' => 'Low - High',
                'weight_value' => 6,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'Low',
                'weight_value' => 1,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'Low - Medium',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'Medium',
                'weight_value' => 3,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'Medium - High',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'High',
                'weight_value' => 5,
            ],
            [
                'criteria_id' => 3,
                'subcriteria_name' => 'Low - High',
                'weight_value' => 6,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Soft',
                'weight_value' => 1,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Soft - Medium',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Medium',
                'weight_value' => 3,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Medium - Hard',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Hard',
                'weight_value' => 5,
            ],
            [
                'criteria_id' => 4,
                'subcriteria_name' => 'Soft - Hard',
                'weight_value' => 6,
            ],
            [
                'criteria_id' => 5,
                'subcriteria_name' => 'Easy',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 5,
                'subcriteria_name' => 'Medium',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 5,
                'subcriteria_name' => 'Difficult',
                'weight_value' => 6,
            ],
            [
                'criteria_id' => 6,
                'subcriteria_name' => 'min >=  10 && min <= 13',
                'weight_value' => 2,
            ],
            [
                'criteria_id' => 6,
                'subcriteria_name' => 'min >= 14 && min <= 18',
                'weight_value' => 4,
            ],
            [
                'criteria_id' => 6,
                'subcriteria_name' => 'min >=  19 && min <= 22',
                'weight_value' => 6,
            ],
        ]);
    }
}
