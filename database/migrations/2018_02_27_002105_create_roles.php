<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = \HttpOz\Roles\Models\Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'group' => 'admin',
            'description' => 'Can make all the changes'
        ]);

        $seniorAgentRole = \HttpOz\Roles\Models\Role::create([
            'name' => 'Senior Agent',
            'slug' => 'senior_agent',
            'group' => 'admin',
            'description' => 'Can only view realestate, can send realestate offers'
        ]);

        $juniorAgentRole = \HttpOz\Roles\Models\Role::create([
            'name' => 'Junior Agent',
            'slug' => 'junior_agent',
            'group' => 'admin',
            'description' => 'Can only view realestate up to 17h localtime'
        ]);

        $sellerUserRole = \HttpOz\Roles\Models\Role::create([
            'name' => 'Seller',
            'slug' => 'seller',
            'group' => 'users',
            'description' => ''
        ]);

        $buyerUserRole = \HttpOz\Roles\Models\Role::create([
            'name' => 'Buyer',
            'slug' => 'buyer',
            'group' => 'users',
            'description' => ''
        ]);           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
