<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeder\LocationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationsSeeder::class);
    }
}
