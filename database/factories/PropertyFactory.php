<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Property::class, function (Faker $faker) {
	$price = rand(1, 10) * 100; 
	$price_lower = rand(0, 1) ? $price / 2 : null; 

    return [
        'street_id' => rand(0, 200),
        'house_number' => $faker->buildingNumber,
        'price' => $price,
        'price_lower' => $price_lower,
        'size' => rand(30, 200),
        'expected_expences' => rand(30, 200),
        'terrace' => rand(0, 1) ? 1 : null,
        'big_terrace' => rand(0, 1) ? 1 : null,
        'balcony' => rand(0, 1) ? 1 : null,
        'terrace_size' => rand(0, 1) ? rand(5,20) : null,
        'terrace_number' => rand(0, 1) ? rand(1, 3) : null,
        'yard' => rand(0, 1) ? 1 : null,
        'yard_size' => rand(0, 1) ? rand(2,20) : null,
		'pool' => rand(0, 1) ? 1 : null,
		'parking_space' => rand(0, 1) ? 1 : null,
		'num_parking_spaces' => rand(0, 1) ? rand(1, 3) : null,
		'garadge' => rand(0, 1) ? 1 : null,
		'floor' => rand(0, 1) ? rand(-2, 10) : null,
		'floor_total' => rand(0, 1) ? rand(4, 10) : null,
		
		'new' => rand(0, 1) ? 1 : null,
		'saloon' => rand(0, 1) ? 1 : null,
		'lux' => rand(0, 1) ? 1 : null,
		'modern' => rand(0, 1) ? 1 : null,
		'penthouse' => rand(0, 1) ? 1 : null,
		'residence' => rand(0, 1) ? 1 : null,
		'attic' => rand(0, 1) ? 1 : null,
		'elevator' => rand(0, 1) ? 1 : null,
		'cable_tv' => rand(0, 1) ? 1 : null,
		'internet' => rand(0, 1) ? 1 : null,
		'telephone' => rand(0, 1) ? 1 : null,
		'telephone_lines' => rand(0, 1) ? rand(1, 3) : null,
		'air_condition' => rand(0, 1) ? 1 : null,
		'duplex' => rand(0, 1) ? 1 : null,
		'stove' => rand(0, 1) ? 1 : null,
		'fridge' => rand(0, 1) ? 1 : null,
		'washing_machine' => rand(0, 1) ? 1 : null,
		'dishwasher' => rand(0, 1) ? 1 : null,
		'kitchen_units' => rand(0, 1) ? 1 : null,
		'closets' => rand(0, 1) ? 1 : null,
		'open_space' => rand(0, 1) ? 1 : null,
		'pet_friendly' => rand(0, 1) ? 1 : null,
		'bedrooms' => rand(0, 1) ? rand(1, 5) : null,
		'bathrooms' => rand(0, 1) ? rand(1, 5) : null,
		'offices' => rand(0, 1) ? rand(1, 5) : null,
		
		'recomended' => rand(0, 1) ? 1 : null,
		'published' => rand(0, 1) ? 1 : null,
		'most_views' => rand(0, 1) ? 1 : null,
		'agent_id' => User::inRandomOrder()->first()->id,
    ];

/*
    $table->integer('city_id')->nullable(); // CITY
    $table->integer('location_id')->nullable(); // LOCATION
    $table->integer('rent_type_id');
    $table->integer('property_type_id');
    $table->integer('property_structure_id');
    // $table->boolean('furniture');
    $table->integer('property_heating_id')->nullable();

    $table->string('gps')->nullable();
    $table->integer('owner_id')->nullable();
    $table->integer('agent_id');
*/

});
