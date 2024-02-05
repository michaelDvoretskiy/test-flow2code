<?php

namespace Database\Seeders;

use App\Models\MovieType;
use Illuminate\Database\Seeder;

class MovieTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        MovieType::upsert([
            [
                'id' => 1,
                'name' => 'Comedy'
            ],
            [
                'id' => 2,
                'name' => 'Drama'
            ],
            [
                'id' => 3,
                'name' => 'Fantasy'
            ],
        ], 'id');
    }
}
