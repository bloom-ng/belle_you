<?php

namespace Database\Seeders;

use App\Models\StoreSetting;
use Illuminate\Database\Seeder;

class StoreSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreSetting::factory()
            ->count(5)
            ->create();
    }
}
