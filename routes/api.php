<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'LoginController@login')->name('auth.login');
Route::post('logout', 'LoginController@logout');
Route::post('register', 'RegisterController@apiRegister');


Route::middleware('auth:api')->group(function () {

    Route::get('buildings', 'BuildingController@index');
    Route::get('building/{building:label}', 'BuildingController@show');
    Route::get('building/{building:label}/room/{room:label}', 'RoomController@show');

    Route::get('beacon/{beacon:uuid}', 'BeaconController@show');

    Route::get('my', 'RoomController@access');

    Route::get('my/rooms', 'RoomSettingsController@index');

    Route::put('device/{device:id}', 'DeviceController@update');
});
