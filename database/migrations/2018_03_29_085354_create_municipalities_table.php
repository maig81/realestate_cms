<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('city_id');
            $table->timestamps();
            $table->softDeletes();        
        });

        DB::table('municipalities')->insert([
            ["name" => "BARAJEVO", "city_id" => 1],
            ["name" => "ČUKARICA", "city_id" => 1],
            ["name" => "GROCKA", "city_id" => 1],
            ["name" => "LAZAREVAC", "city_id" => 1],
            ["name" => "MLADENOVAC", "city_id" => 1],
            ["name" => "NOVI BEOGRAD", "city_id" => 1],
            ["name" => "OBRENOVAC", "city_id" => 1],
            ["name" => "PALILULA", "city_id" => 1],
            ["name" => "RAKOVICA", "city_id" => 1],
            ["name" => "SAVSKI VENAC", "city_id" => 1],
            ["name" => "SOPOT", "city_id" => 1],
            ["name" => "STARI GRAD", "city_id" => 1],
            ["name" => "SURČIN", "city_id" => 1],
            ["name" => "VOŽDOVAC", "city_id" => 1],
            ["name" => "VRAČAR", "city_id" => 1],
            ["name" => "ZEMUN", "city_id" => 1],
            ["name" => "ZVEZDARA", "city_id" => 1]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
    }
}
