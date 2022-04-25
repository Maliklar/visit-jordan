<?php

use App\Http\Controllers\Api\Admin\Hotel\HotelAdminController;
use App\Http\Controllers\Api\Admin\Hotel\HotelBranchAdminController;
use App\Http\Controllers\Api\Admin\Hotel\HotelBranchImagesAdminController;
use App\Http\Controllers\Api\Admin\Hotel\RoomAdminController;
use App\Http\Controllers\Api\Admin\Hotel\RoomCategoryAdminController;
use App\Http\Controllers\Api\Admin\Hotel\RoomCategoryImagesAdminController;
use App\Http\Controllers\Api\Hotel\HoteReservationController;
use App\Http\Controllers\Api\Hotel\RoomCategoryController;
use App\Http\Controllers\Api\Hotel\RoomController;
use App\Http\Controllers\Api\User\PublicUserController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/users/login', [UserController::class, 'login']);


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel API - Admin
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/hotels/auth', [HotelAdminController::class, 'auth']);
    Route::post('/admin/hotels/update', [HotelAdminController::class, 'update']);
    Route::get('/admin/hotels/get', [HotelAdminController::class, 'get']);
});
Route::post('/admin/hotels/register', [HotelAdminController::class, 'register']);





/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel Branch API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/branches/add', [HotelBranchAdminController::class, 'add']);
    Route::get('/admin/hotels/branches/get', [HotelBranchAdminController::class, 'get']);
    Route::get('/admin/hotels/branches/get/{id}', [HotelBranchAdminController::class, 'getById']);

    Route::patch('/admin/hotels/branches/update', [HotelBranchAdminController::class, 'update']);

    Route::patch('/admin/hotels/branches/activate', [HotelBranchAdminController::class, 'activate']);
    Route::patch('/admin/hotels/branches/deactivate', [HotelBranchAdminController::class, 'delete']);

    Route::delete('/admin/hotels/branches/delete', [HotelBranchAdminController::class, 'delete']);
});


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel Branch Images API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/branches/images/interior/add', [HotelBranchImagesAdminController::class, 'addInterior']);
    Route::post('/admin/hotels/branches/images/building/add', [HotelBranchImagesAdminController::class, 'addBuilding']);
    Route::post('/admin/hotels/branches/images/view/add', [HotelBranchImagesAdminController::class, 'addView']);

    Route::get('/admin/hotels/branches/images/interior/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getInterior']);
    Route::get('/admin/hotels/branches/images/building/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getBuilding']);
    Route::get('/admin/hotels/branches/images/view/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getView']);

    Route::delete('/admin/hotels/branches/images/delete/{id}', [HotelBranchImagesAdminController::class, 'delete']);
});



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room Category API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/rooms/categories/add', [RoomCategoryAdminController::class, 'add']);
    Route::patch('/admin/hotels/rooms/categories/update', [RoomCategoryAdminController::class, 'update']);

    Route::get('/admin/hotels/rooms/categories/get', [RoomCategoryAdminController::class, 'get']);
    Route::get('/admin/hotels/rooms/categories/get/{category_id}', [RoomCategoryAdminController::class, 'getById']);
    Route::get('/admin/hotels/rooms/categories/get/branch/{branch_id}', [RoomCategoryAdminController::class, 'getByBranchId']);
    Route::get('/admin/hotels/rooms/categories/get/{branch_id}/{category_id}', [RoomCategoryAdminController::class, 'getByBrandAndCategoryId']);

    Route::patch('/admin/hotels/rooms/categories/deactivate/{category_id}', [RoomCategoryAdminController::class, 'deactivate']);
    Route::patch('/admin/hotels/rooms/categories/activate/{category_id}', [RoomCategoryAdminController::class, 'activate']);


    Route::delete('/admin/hotels/rooms/categories/delete/{category_id}', [RoomCategoryAdminController::class, 'delete']);
});



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room >> Category >> Images API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/rooms/categories/images/room/add', [RoomCategoryImagesAdminController::class, 'addRoom']);
    Route::post('/admin/hotels/rooms/categories/images/view/add', [RoomCategoryImagesAdminController::class, 'addView']);

    Route::get('/admin/hotels/rooms/categories/images/room/get/{category_id}', [RoomCategoryImagesAdminController::class, 'getRoom']);
    Route::get('/admin/hotels/rooms/categories/images/view/get/{category_id}', [RoomCategoryImagesAdminController::class, 'getView']);

    Route::delete('/admin/hotels/rooms/categories/images/delete/{image_id}', [RoomCategoryImagesAdminController::class, 'delete']);
});


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/rooms/add', [RoomAdminController::class, 'add']);
    Route::get('/admin/hotels/rooms/get', [RoomAdminController::class, 'get']);
    Route::get('/admin/hotels/rooms/get/{room_id}', [RoomAdminController::class, 'getById']);
    Route::get('/admin/hotels/rooms/get/category/{category_id}', [RoomAdminController::class, 'getByCategoryId']);
    Route::get('/admin/hotels/rooms/get/branch/{branch_id}', [RoomAdminController::class, 'getByBranchId']);

    Route::get('/admin/hotels/rooms/get/branch_rooms_table/{branch_id}', [RoomAdminController::class, 'getBranchRoomsTable']);
});



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Reservations API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/hotels/reservations/get', [HoteReservationController::class, 'get']);
});

/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| City API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/

Route::get('/cities/get', [CityController::class, 'get']);


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Public Users API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/users/register', [RoomController::class, 'register']);
    Route::get('/hotels/rooms/reservations/{id}', [RoomController::class, 'getReservations']);
});
Route::post('/users/register', [PublicUserController::class, 'register']);




/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Users Hotel API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/hotels/rooms/reserve', [RoomController::class, 'reserve']);
});



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
