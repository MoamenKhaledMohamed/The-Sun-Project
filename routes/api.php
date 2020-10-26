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
use App\Http\Controllers\NeedyController;
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

/*
|--------------------------------------------------------------------------
Auth Routes
|--------------------------------------------------------------------------
*/

Route::post('/register','App\Http\Controllers\AuthController@register');
Route::post('/login','App\Http\Controllers\AuthController@login');



/*
|--------------------------------------------------------------------------
User Routes
|--------------------------------------------------------------------------
*/

Route::get('/users', [UserController::class, 'index']);

Route::delete('/user/{id}', [UserController::class, 'destroy']);


Route::get('/user/{id}/search', [UserController::class, 'search']);

Route::post('/user/store', [UserController::class, 'store']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::put('/user/{id}/update', [UserController::class, 'update']);


/*
|--------------------------------------------------------------------------
Events Routes
|--------------------------------------------------------------------------
*/

Route::get('/events', [EventController::class, 'getEventsCommingSoon']);
Route::get('/oldevents', [EventController::class, 'getOldEvents']);




/*
|--------------------------------------------------------------------------
Needy Routes
|--------------------------------------------------------------------------
*/

Route::post('/needy/create', [NeedyController::class, 'addNeedyAndOutput']);
