<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('municipality_id');
            $table->timestamps();
            $table->softDeletes();  
        });

        DB::table('locations')->insert([

            [ "name" => "Strogi centar", "municipality_id" => "12"],
            [ "name" => "Dorćol", "municipality_id" => "12"],
            [ "name" => "Savski Venac", "municipality_id" => "10"],
            [ "name" => "Senjak", "municipality_id" => "10"],
            [ "name" => "Topčidersko brdo", "municipality_id" => "10"],
            [ "name" => "Dedinje", "municipality_id" => "10"],
            [ "name" => "Vračar", "municipality_id" => "15"],
            [ "name" => "Neimar", "municipality_id" => "15"],
            [ "name" => "Čubura", "municipality_id" => "15"],
            [ "name" => "Crveni krst", "municipality_id" => "15"],
            [ "name" => "Lekino brdo", "municipality_id" => "14"],
            [ "name" => "Šumice", "municipality_id" => "14"],
            [ "name" => "Voždovac", "municipality_id" => "14"],
            [ "name" => "Dušanovac", "municipality_id" => "14"],
            [ "name" => "Braće Jerković", "municipality_id" => "14"],
            [ "name" => "Medaković", "municipality_id" => "14"],
            [ "name" => "Banjica", "municipality_id" => "14"],
            [ "name" => "Kumodraž", "municipality_id" => "14"],
            [ "name" => "Ostalo-14", "municipality_id" => "14"],
            [ "name" => "17, Centar", "municipality_id" => "17"],
            [ "name" => "Kod Vuka", "municipality_id" => "17"],
            [ "name" => "Kod Liona", "municipality_id" => "17"],
            [ "name" => "Kod Cvetka", "municipality_id" => "17"],
            [ "name" => "Konjarnik", "municipality_id" => "17"],
            [ "name" => "Mali mokri lug", "municipality_id" => "17"],
            [ "name" => "Zvezdara", "municipality_id" => "17"],
            [ "name" => "Mirijevo", "municipality_id" => "17"],
            [ "name" => "Palilula, centar", "municipality_id" => "8"],
            [ "name" => "Karaburma", "municipality_id" => "8"],
            [ "name" => "Karaburma,Ćalije", "municipality_id" => "8"],
            [ "name" => "Višnjica", "municipality_id" => "8"],
            [ "name" => "Kotež", "municipality_id" => "8"],
            [ "name" => "Krnjača", "municipality_id" => "8"],
            [ "name" => "Borča", "municipality_id" => "8"],
            [ "name" => "Ovča", "municipality_id" => "8"],
            [ "name" => "Padinska skela", "municipality_id" => "8"],
            [ "name" => "Rakovica", "municipality_id" => "9"],
            [ "name" => "Miljakovac", "municipality_id" => "9"],
            [ "name" => "Kanarevo brdo", "municipality_id" => "9"],
            [ "name" => "Nova skojevska", "municipality_id" => "9"],
            [ "name" => "Vidikovac", "municipality_id" => "9"],
            [ "name" => "Labudovo brdo", "municipality_id" => "9"],
            [ "name" => "Petlovo brdo", "municipality_id" => "9"],
            [ "name" => "Kijevo", "municipality_id" => "9"],
            [ "name" => "Kneževac", "municipality_id" => "9"],
            [ "name" => "Resnik", "municipality_id" => "9"],
            [ "name" => "Stara Čukarica", "municipality_id" => "2"],
            [ "name" => "Banovo brdo", "municipality_id" => "2"],
            [ "name" => "Čukarička padina", "municipality_id" => "2"],
            [ "name" => "Golf naselje", "municipality_id" => "2"],
            [ "name" => "Julino brdo", "municipality_id" => "2"],
            [ "name" => "Žarkovo", "municipality_id" => "2"],
            [ "name" => "Cerak", "municipality_id" => "2"],
            [ "name" => "Cerak vinogradi", "municipality_id" => "2"],
            [ "name" => "Bele vode", "municipality_id" => "2"],
            [ "name" => "Rušanj", "municipality_id" => "2"],
            [ "name" => "Železnik", "municipality_id" => "2"],
            [ "name" => "Sremčica", "municipality_id" => "2"],
            [ "name" => "Filmski grad", "municipality_id" => "2"],
            [ "name" => "Bliži blokovi", "municipality_id" => "6"],
            [ "name" => "Stari deo", "municipality_id" => "6"],
            [ "name" => "Savski blokovi", "municipality_id" => "6"],
            [ "name" => "Bežanija", "municipality_id" => "6"],
            [ "name" => "Bežanijska kosa", "municipality_id" => "6"],
            [ "name" => "Ledine", "municipality_id" => "6"],
            [ "name" => "Hotel Jugoslavija", "municipality_id" => "16"],
            [ "name" => "Retenzija", "municipality_id" => "16"],
            [ "name" => "Zemun, Centar", "municipality_id" => "16"],
            [ "name" => "Zemun, Kalvarija", "municipality_id" => "16"],
            [ "name" => "Zemun, Gornji grad", "municipality_id" => "16"],
            [ "name" => "Zemun, Novi grad", "municipality_id" => "16"],
            [ "name" => "Zemun, Ćukovac", "municipality_id" => "16"],
            [ "name" => "Zemun, Save Kovačević", "municipality_id" => "16"],
            [ "name" => "Zemun, Marije Bursać", "municipality_id" => "16"],
            [ "name" => "Zemun polje", "municipality_id" => "16"],
            [ "name" => "Surčin", "municipality_id" => "16"],
            [ "name" => "Galenika", "municipality_id" => "16"],
            [ "name" => "Batajnica", "municipality_id" => "16"],
            [ "name" => "Barajevo", "municipality_id" => "1"],
            [ "name" => "Obrenovac", "municipality_id" => "7"],
            [ "name" => "Grocka", "municipality_id" => "3"],
            [ "name" => "Sopot", "municipality_id" => "11"],
            [ "name" => "Stara Pazova", "municipality_id" => "18"],
            [ "name" => "Nova Pazova", "municipality_id" => "18"],
            [ "name" => "Novi Banovci", "municipality_id" => "18"],
            [ "name" => "Stari Banovci", "municipality_id" => "18"],
            [ "name" => "Mladenovac", "municipality_id" => "5"],
            [ "name" => "Šumadija", "municipality_id" => "19", "municipality_id" => "19"],
            [ "name" => "Smederevo Centar", "municipality_id" => "20", "municipality_id" => "19"]
        ]);   
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
