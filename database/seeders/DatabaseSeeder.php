<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AddressSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(CarouselSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(QuoteSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(StoreSettingSeeder::class);
        $this->call(UiSettingSeeder::class);
        $this->call(UserSeeder::class);
    }
}
