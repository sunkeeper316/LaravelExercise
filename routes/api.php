<?php
use App\Http\Controllers\Api\TeController;
use App\Http\Controllers\TestController;

// use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use app\Http\Controllers\AuthController;
// use App\Http\Controllers\TestController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('post',PostController::class);
Route::post('test',[TestController::class,'test']);
Route::get('te',[TeController::class,'te']);
// Route::post('login',[AuthController::class,'login']);


// Route::get('/test2', 'App\Http\Controllers\TestController@test');
// Route::post('/login',[AuthController::class,'login']);
// Route::get('/',[AuthController::class,'me']);
Route::group(['prefix' => 'auth'], function () {
    Route::get('/', 'Api\AuthController@me')->name('me');
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::post('logout', 'Api\AuthController@logout')->name('logout');
});
