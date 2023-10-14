<?php

namespace Database\Seeders;

use App\Models\BlogPostTag;
use Illuminate\Database\Seeder;

class BlogPostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogPostTag::factory()
            ->count(5)
            ->create();
    }
}
