<?php

namespace Database\Seeders;

use App\Models\UiSetting;
use Illuminate\Database\Seeder;

class UiSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UiSetting::factory()
            ->count(5)
            ->create();
    }
}
