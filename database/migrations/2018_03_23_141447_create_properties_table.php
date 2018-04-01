<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->nullable()->defalut(1);
            $table->integer('location_id')->nullable();
            $table->integer('street_id')->nullable();
            $table->integer('rent_type_id')->nullable();
            $table->integer('property_type_id')->nullable();
            $table->integer('property_structure_id')->nullable();
            
            $table->string('house_number')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_lower')->nullable();
            $table->integer('size')->nullable();
            $table->string('expected_expences')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('floor_total')->nullable();

            // $table->boolean('furniture');
            $table->boolean('terrace')->nullable();
            $table->boolean('big_terrace')->nullable();
            $table->boolean('balcony')->nullable();
            $table->integer('terrace_size')->nullable();
            $table->integer('terrace_number')->nullable();

            $table->boolean('yard')->nullable();
            $table->integer('yard_size')->nullable();
            $table->boolean('pool')->nullable();
            $table->boolean('parking_space')->nullable();
            $table->boolean('num_parking_spaces')->nullable();
            $table->boolean('garadge')->nullable();

            $table->boolean('new')->nullable();
            $table->boolean('saloon')->nullable();
            $table->boolean('lux')->nullable();
            $table->boolean('modern')->nullable();
            $table->boolean('penthouse')->nullable();
            $table->boolean('residence')->nullable();

            $table->boolean('attic')->nullable();
            $table->boolean('elevator')->nullable();
            $table->boolean('cable_tv')->nullable();
            $table->boolean('internet')->nullable();
            $table->boolean('telephone')->nullable();
            $table->integer('telephone_lines')->nullable();
            $table->boolean('air_condition')->nullable();
            $table->boolean('duplex')->nullable();

            $table->boolean('stove')->nullable();
            $table->boolean('fridge')->nullable();
            $table->boolean('washing_machine')->nullable();
            $table->boolean('dishwasher')->nullable();
            $table->boolean('kitchen_units')->nullable();
            $table->boolean('closets')->nullable();
            $table->boolean('open_space')->nullable();
            $table->boolean('pet_friendly')->nullable();

            $table->integer('property_heating_id')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('offices')->nullable();

            $table->boolean('recomended')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('most_views')->nullable();

            $table->text('note')->nullable();
            $table->text('private_note')->nullable();

            $table->string('gps')->nullable();
            $table->integer('owner_id')->nullable();
            $table->integer('agent_id');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
