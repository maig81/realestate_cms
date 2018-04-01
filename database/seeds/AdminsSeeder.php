<?php

use Illuminate\Database\Seeder;
use \HttpOz\Roles\Models\Role;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::findBySlug('admin');
        
        factory(App\User::class, 10)->create()->each(function ($u) use ($adminRole) {
        	$u->attachRole($adminRole);
    	});
    }
}
