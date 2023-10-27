<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;
use Spatie\FlareClient\Api;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Route::post('/elementi', 'ElementiController@crea');

//Route::get('tickets', [ApiOrderController::class, 'index']);

// Route::middleware('auth:sanctum')->get('/api/elementi', 'ApiController@getElemeni');


Route::get('/tickets', [ApiController::class, 'index']);
