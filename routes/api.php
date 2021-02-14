<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;

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
Route::group([], function ($router) {
    Route::get('/', 'Controller@routes');
});

/* TODO: Implementation of JWT token security */
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::get('me', 'AuthController@me')->name('me');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh')->name('refresh');

    
});


/*TODO Add to security with token. This url are public now */
Route::group([

    'middleware' => 'api',

], function ($router) {
    Route::resource('questions', 'QuestionController');
});

Route::fallback(function () {
    return response()->json(['error' => 'Not Found!'], 404);
});