<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => \UriLocalizer::localeFromRequest()], function () {

    // AUTH
    Auth::routes();
    
// UPDATES AND MIGRATION
Route::get('/laravel/migrate', 'HomeController@migrate');
Route::get('/laravel/update', 'HomeController@update');

    
    // SKINUTI!!!
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


    /**
     * FRONT END
     */
        Route::get('/', function () { return "home"; });


    /**
     * BACKEND
     */

        // ADMINSTRATORS
        Route::get('/admin/admins', 'UsersController@adminIndex')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/admins/{user}', 'UsersController@adminEdit')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/admins/update/{user}', 'UsersController@adminUpdate')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/admins/create', 'UsersController@adminCreate')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/admins/update/{user}', 'UsersController@adminUpdate')->middleware('auth')->middleware('role:admin');

        // BUYERS
        Route::get('/admin/buyers', 'UsersController@buyersIndex')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/buyers/{user}', 'UsersController@buyersEdit')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/buyers/create', 'UsersController@buyersCreate')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/buyers/update/{user}', 'UsersController@buyersUpdate')->middleware('auth')->middleware('role:admin');
        
        // SELLERS
        Route::get('/admin/sellers', 'UsersController@sellersIndex')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/sellers/{user}', 'UsersController@sellersEdit')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/sellers/create', 'UsersController@sellersCreate')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/sellers/update/{user}', 'UsersController@sellersUpdate')->middleware('auth')->middleware('role:admin');

        // USERS
        Route::get('/admin/users/delete/{user}', 'UsersController@delete')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/users/restore/{user}', 'UsersController@restore')->middleware('auth')->middleware('role:admin');

        // PROPERTIES
        Route::get('/admin/properties', 'PropertyController@adminIndex')->middleware('auth');
        Route::get('/admin/properties/create', 'PropertyController@create')->middleware('auth');

        // CITY
        Route::get('/admin/city', 'CityController@adminIndex')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/city/create', 'CityController@create')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/city/update/{city}', 'CityController@update')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/city/data', 'CityController@indexData')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/city/{city}', 'CityController@edit')->middleware('auth')->middleware('role:admin');


        // MUNICIPALITY
        Route::get('/admin/municipality', 'MunicipalityController@adminIndex')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/municipality/create', 'MunicipalityController@create')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/municipality/data', 'MunicipalityController@indexData')->middleware('auth')->middleware('role:admin');
        Route::post('/admin/municipality/update/{municipality}', 'MunicipalityController@update')->middleware('auth')->middleware('role:admin');
        Route::get('/admin/municipality/{municipality}', 'MunicipalityController@edit')->middleware('auth')->middleware('role:admin');

        // 
        // Route::get('/admin/users/{user}', 'UsersController@userEdit')->middleware('auth')->middleware('role:admin');
        // Route::post('/admin/user/update/{user}', 'UsersController@adminUpdate')->middleware('auth')->middleware('role:admin');
        // Route::post('/admin/user/create', 'UsersController@adminCreate')->middleware('auth')->middleware('role:admin');


        // PAGES
        Route::get('/admin', 'PageController@admin')->middleware('auth')->middleware('group:admin');



});



