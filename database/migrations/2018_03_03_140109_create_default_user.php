<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $user = App\User::create([
            'name' => 'Marko',
            'lastname' => 'Marjanovic',
            'email' => 'maig81@gmail.com',
            'password' => bcrypt('kataklinger12'),
        ]);

        $user->attachRole(1); 

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
