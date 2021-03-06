<?php

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
        $this->call(AdminUserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AgencySeeder::class);
        $this->call(CategoryParentSeeder::class);
        $this->call(OfferSeeder::class);
    }
}
