<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

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

// routes/web.php
Route::group(['middleware'=>['guest']],function(){

    Route::get('/', function()
    {
        return view('auth.login');
    });

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

        Route::group(['namespace'=>'Country'],function()
        {
            Route::resource('countries', 'CountriesController');
        });
        Route::group(['namespace'=>'government'],function()
        {
            Route::resource('government', 'GovernmentController');
        });
        Route::group(['namespace'=>'city'],function()
        {
            Route::get('/city/{id}', 'CityController@getGovernment');
            Route::resource('city', 'CityController');

        });
        Route::group(['namespace'=>'area'],function()
        {
            Route::get('/area/{id}', 'AreaController@getcity');
            Route::resource('area', 'AreaController');
        });

        Route::group(['namespace'=>'User_type'],function()
        {
                Route::resource('User_type','User_typeController');
        });
        Route::group(['namespace'=>'specialtiy'],function()
        {
            Route::resource('specialtiy', 'SpecialtiyController');
        });
        Route::group(['namespace'=>'service_type'],function()
        {
            Route::resource('service_type', 'Service_typeController');
        });
        Route::group(['namespace'=>'provider'],function()
        {
            Route::resource('provider', 'ProviderController');
        });
        Route::group(['namespace'=>'provider_Category'],function()
        {
            Route::resource('provider_Category', 'Provider_CategoryController');
        });
        Route::get('/{page}', 'AdminController@index');
    });




