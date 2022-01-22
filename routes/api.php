

    <?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */
    Route::group(['namespace'=>'API'],function()
    {
     
        Route::post('login_by_email', [ApiController::class, 'authenticate']);
        Route::post('login_by_phone', [ApiController::class, 'authenticate_by_phone']);
        Route::post('register', [ApiController::class, 'register']);
    });

  
    Route::group(['middleware' => ['jwt.verify','api','checkpassword','changeLanguage'],'namespace'=>'API'], function() {

        Route::post('logout', [ApiController::class, 'logout']);
        Route::post('get_user', [ApiController::class, 'get_user']);
       
    });
  
    Route::group(['middleware' => ['api','checkpassword','changeLanguage'],'namespace'=>'API'], function() {

        Route::post('Specialtiy','Specialtiycontroller@index');
        Route::post('Specialtiy_id','Specialtiycontroller@show');
        Route::post('Specialtiystore','Specialtiycontroller@store');

        Route::post('User_type','User_typecontroller@index');
        // get Countries
        Route::post('Countries','Countriescontroller@index');
        // get Government
        Route::post('Government','Governmentcontroller@show');
        // get City
        Route::post('City','Citycontroller@show');
        // get Area
        Route::post('Area','Areacontroller@show');
        //add conversion_purpose
        Route::post('conversion_purpose_add','conversion_purposecontroller@store');
        //add conversion_purpose
        Route::post('conversion_purpose','conversion_purposecontroller@index');
        // add transfer_type
        Route::post('transfer_type_add','transfer_typecontroller@store');
        //add conversion_purpose
        Route::post('transfer_type','transfer_typecontroller@index');
      
        Route::post('Join_request','Join_requestcontroller@store');
        //add details_Request
        Route::post('details_Request','details_Requestcontroller@store');
        Route::post('Request','RequestsController@store');

    });