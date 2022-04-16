<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\HomeBannerController;
use App\Http\Controllers\Api\HotelsController;
use App\Http\Controllers\Api\UserController;
use App\Models\CarCompany;
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
| All Users Login Point (Single piont to login all users)
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::post('/users/login', [UserController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Admin Users
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::post('/admin/login', [AdminController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/auth', [AdminController::class, 'auth']);
});



/*
|--------------------------------------------------------------------------
| Home Banners (Only Admin can access)
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/homebanners/add', [HomeBannerController::class, 'add']);
});

Route::get('/homebanners/get', [HomeBannerController::class, 'get']);





/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/hotels/auth', [HotelsController::class, 'auth']);  // Auth
    Route::post('/hotels/add', [HotelsController::class, 'add']);  // Add (admin add a hotel)
    Route::get('/admin/hotels/get', [HotelsController::class, 'getAdmin']);  // Add (admin add a hotel)
    Route::post('/admin/hotels/edit', [HotelsController::class, 'edit']);  // Add (admin add a hotel)
    Route::post('/admin/branches/add', [BranchController::class, 'add']);  // Add (admin add a hotel)
    Route::get('/admin/branches/get', [BranchController::class, 'get']);  // Add (admin add a hotel)
    Route::patch('/hotels/edit', [HotelsController::class, 'edit']);  // Edit (admin Edit hotel info)
});

Route::post('/admin/hotels/login', [HotelsController::class, 'login']);  // Add (admin add a hotel)

Route::post('/hotels/register', [HotelsController::class, 'register']);


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Cars Admin API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/cars/auth', [CarController::class, 'auth']);  // Auth
    Route::post('/admin/cars/edit', [CarController::class, 'edit']);  // Add (admin add a hotel)
    Route::get('/admin/cars/get', [CarController::class, 'getAdmin']);  // Add (admin add a hotel)

});

Route::post('/admin/cars/register', [CarController::class, 'register']);
