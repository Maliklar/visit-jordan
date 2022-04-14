<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\HomeBannerController;
use App\Http\Controllers\Api\HotelsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/*
|--------------------------------------------------------------------------
| Admin Users
|--------------------------------------------------------------------------
*/

Route::post('/admin/login', [AdminController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/auth', [AdminController::class, 'auth']);
    // Route::post('/admin/logout', [AdminController::class, 'logout']);
});



//home banner

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/homebanners/add', [HomeBannerController::class, 'add']);
});

Route::get('/homebanners/get', [HomeBannerController::class, 'get']);



// HOTELS
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/hotels/auth', [HotelsController::class, 'auth']);
    Route::get('/hotels/add', [HotelsController::class, 'add']);
});

Route::post('/hotels/register', [HotelsController::class, 'register']);
Route::post('/hotels/login', [HotelsController::class, 'login']);


Route::get('/homebanners/get', [HomeBannerController::class, 'get']);
