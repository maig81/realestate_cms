<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(SellersSeeder::class);
        $this->call(BuyersSeeder::class);
    }
}
