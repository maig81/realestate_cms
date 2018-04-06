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
            ["name" => "Barajevo", "city_id" => 1],
            ["name" => "Čukarica", "city_id" => 1],
            ["name" => "Grocka", "city_id" => 1],
            ["name" => "Lazarevac", "city_id" => 1],
            ["name" => "Mladenovac", "city_id" => 1],
            ["name" => "Novi Beograd", "city_id" => 1],
            ["name" => "Obrenovac", "city_id" => 1],
            ["name" => "Palilula", "city_id" => 1],
            ["name" => "Rakovica", "city_id" => 1],
            ["name" => "Savski Venac", "city_id" => 1],
            ["name" => "Sopot", "city_id" => 1],
            ["name" => "Stari Grad", "city_id" => 1],
            ["name" => "Surčin", "city_id" => 1],
            ["name" => "Voždovac", "city_id" => 1],
            ["name" => "Vračar", "city_id" => 1],
            ["name" => "Zemun", "city_id" => 1],
            ["name" => "Zvezdara", "city_id" => 1],
            ["name" => "Stara Pazova", "city_id" => 1],
            ["name" => "Šumadija", "city_id" => 1],
            ["name" => "Podunavlje", "city_id" => 1],
            ["name" => "Smederevo", "city_id" => 1]
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
