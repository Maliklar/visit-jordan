<?php

use App\Http\Controllers\Api\Hotel\HotelBranchController;
use App\Http\Controllers\Api\Hotel\HotelController;
use App\Http\Controllers\Api\Hotel\RoomCategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CityController;
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

// Route::post('/admin/login', [AdminController::class, 'login']);
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/admin/auth', [AdminController::class, 'auth']);
// });



/*
|--------------------------------------------------------------------------
| Home Banners (Only Admin can access)
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/homebanners/add', [HomeBannerController::class, 'add']);
// });

// Route::get('/homebanners/get', [HomeBannerController::class, 'get']);





/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel API - Admin
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/hotels/auth', [HotelController::class, 'auth']);
    Route::post('/admin/hotels/update', [HotelController::class, 'adminUpdate']);
    Route::get('/admin/hotels/get', [HotelController::class, 'getAdmin']);
});


Route::post('/admin/hotels/register', [HotelController::class, 'register']);



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel Branch API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/branches/add', [HotelBranchController::class, 'add']);
    Route::get('/admin/hotels/branches/get', [HotelBranchController::class, 'getAdmin']);
    Route::post('/admin/hotels/branches/images/interior/add', [HotelBranchController::class, 'addInteriorImages']);
    Route::post('/admin/hotels/branches/images/building/add', [HotelBranchController::class, 'addBuildingImages']);
    Route::post('/admin/hotels/branches/images/view/add', [HotelBranchController::class, 'addViewImages']);
});


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel Branch API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/branches/add', [HotelBranchController::class, 'add']);
    Route::get('/admin/hotels/branches/get', [HotelBranchController::class, 'getAdmin']);
    Route::post('/admin/hotels/branches/images/interior/add', [HotelBranchController::class, 'addInteriorImages']);
    Route::post('/admin/hotels/branches/images/building/add', [HotelBranchController::class, 'addBuildingImages']);
    Route::post('/admin/hotels/branches/images/view/add', [HotelBranchController::class, 'addViewImages']);
});


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room Category API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/branches/room_categories/add', [RoomCategoryController::class, 'add']);
    Route::post('/admin/hotels/branches/room_categories/images/room/add', [RoomCategoryController::class, 'addRoomImages']);
    Route::post('/admin/hotels/branches/room_categories/images/view/add', [RoomCategoryController::class, 'addViewImages']);
    Route::get('/admin/hotels/branches/room_categories/get/{branch_id}', [RoomCategoryController::class, 'getAll']);
    Route::get('/admin/hotels/branches/room_categories/get/{branch_id}/{category_id}', [RoomCategoryController::class, 'getSingle']);
});



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| City API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::get('/cities/get', [CityController::class, 'get']);



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Cars Admin API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/admin/cars/auth', [CarController::class, 'auth']);  // Auth
//     Route::post('/admin/cars/edit', [CarController::class, 'edit']);  // Add (admin add a hotel)
//     Route::get('/admin/cars/get', [CarController::class, 'getAdmin']);  // Add (admin add a hotel)
//     Route::post('/admin/cars/branches/add', [CarBranchController::class, 'add']);  // Add (admin add a hotel)

// });

// Route::post('/admin/cars/register', [CarController::class, 'register']);
