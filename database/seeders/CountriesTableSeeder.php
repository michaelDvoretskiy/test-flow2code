<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Country::upsert([
            [
                'id' => 1,
                'name' => 'United  States'
            ],
            [
                'id' => 2,
                'name' => 'Great Britain'
            ],
            [
                'id' => 3,
                'name' => 'Poland'
            ],
        ], 'id');
    }
}
