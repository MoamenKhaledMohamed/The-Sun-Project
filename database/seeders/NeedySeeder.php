<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Needy;

class NeedySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Needy::factory()
            ->times(20)
            ->hasOutputs(2)
            ->create();
    }
}
