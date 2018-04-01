<?php

use Illuminate\Database\Seeder;
use \HttpOz\Roles\Models\Role;

class SellersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role = Role::findBySlug('seller');

		factory(App\User::class, 500)->create()->each(function ($u) use ($role)  {
        	$u->attachRole($role);
    	});
    }
}
