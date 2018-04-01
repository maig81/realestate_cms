<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();  
        });


        DB::table('cities')->insert([
            ["name" => "Beograd"],
            ["name" => "Novi Sad"],
            ["name" => "Niš"],
            ["name" => "Kragujevac"],
            ["name" => "Priština"],
            ["name" => "Subotica"],
            ["name" => "Zrenjanin"],
            ["name" => "Pančevo"],
            ["name" => "Čačak"],
            ["name" => "Kraljevo"],
            ["name" => "Novi Pazar"],
            ["name" => "Smederevo"],
            ["name" => "Leskovac"],
            ["name" => "Vranje"],
            ["name" => "Užice"],
            ["name" => "Valjevo"],
            ["name" => "Kruševac"],
            ["name" => "Šabac"],
            ["name" => "Sombor"],
            ["name" => "Požarevac"],
            ["name" => "Pirot"],
            ["name" => "Zaječar"],
            ["name" => "Kikinda"],
            ["name" => "Sremska Mitrovica"],
            ["name" => "Jagodina"],
            ["name" => "Vršac"],
            ["name" => "Loznica"]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
