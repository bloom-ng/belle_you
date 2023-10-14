<?php

namespace Database\Seeders;

use App\Models\NetworkTeam;
use Illuminate\Database\Seeder;

class NetworkTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NetworkTeam::factory()
            ->count(5)
            ->create();
    }
}
