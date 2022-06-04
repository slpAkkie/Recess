<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ShootingTypeSeeder::class,
            BookingStatusSeeder::class,
            WorkObjectTypeSeeder::class,
        ]);
    }
}
