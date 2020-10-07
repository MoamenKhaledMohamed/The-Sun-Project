<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Output;
use App\Models\Needy;

class OutputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Output::factory()
              ->times(20)
              ->for(Needy::factory())
              ->create();
    }
}
