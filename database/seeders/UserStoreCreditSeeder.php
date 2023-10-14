<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserStoreCredit;

class UserStoreCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserStoreCredit::factory()
            ->count(5)
            ->create();
    }
}
