<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donor;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // many to many wiht event 
        // one to many with donations

        $donor = Donor::factory()
                      ->times(20)
                      ->hasDonations(2)
                      ->hasEvents(1)
                      ->create();

    }
}
