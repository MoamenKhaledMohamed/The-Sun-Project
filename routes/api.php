<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Needy as NeedyResource;
use App\Models\User;
use App\Models\Needy;
use App\Http\Resources\UserCollection;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

###################(1)authentication###########################
Route::post('/register','App\Http\Controllers\AuthController@register');
Route::post('/login','App\Http\Controllers\AuthController@login');
####################End##########################################


##################(2)users(normal workers)#################
Route::get('/users', [UserController::class, 'index']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);
###################End#####################################


####################(3)Events##########################
Route::get('/events', [EventController::class, 'getEventsCommingSoon']);
