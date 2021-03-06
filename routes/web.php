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

      
     
       
        Route::group(['namespace'=>'Application_settings'],function()
        {
            //countries
            Route::resource('countries', 'CountriesController');
            //city
            Route::get('/city/{id}', 'CityController@getGovernment');
            Route::resource('city', 'CityController');
            //government
            Route::resource('government', 'GovernmentController');
            //area
            Route::get('/area/{id}', 'AreaController@getcity');
            Route::resource('area', 'AreaController');
            //User_type
            Route::resource('User_type','User_typeController');
            //specialtiy
            Route::resource('specialtiy','SpecialtiyController');
            //Service_type
            Route::resource('service_type', 'Service_typeController');
            //provider_Category
            Route::resource('provider_Category', 'Provider_CategoryController');
       
        });

    
        Route::group(['namespace'=>'Provider'],function()
        {
            Route::resource('provider', 'ProviderController');
        });
        Route::group(['namespace'=>'provider_attachments'],function()
        {
            Route::resource('provider_attachments', 'provider_attachmentsController');
        });
        Route::get('/{page}', 'AdminController@index');
    });




