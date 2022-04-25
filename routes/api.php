<?php

use App\Http\Controllers\Api\Admin\Hotel\HotelAdminController;
use App\Http\Controllers\Api\Admin\Hotel\HotelBranchAdminController;
use App\Http\Controllers\Api\Admin\Hotel\HotelBranchImagesAdminController;
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
    Route::post('/admin/hotels/branches/images/interior/add', [HotelBranchImagesAdminController::class, 'addInteriorImages']);
    Route::post('/admin/hotels/branches/images/building/add', [HotelBranchImagesAdminController::class, 'addBuildingImages']);
    Route::post('/admin/hotels/branches/images/view/add', [HotelBranchImagesAdminController::class, 'addViewImages']);

    Route::get('/admin/hotels/branches/images/interior/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getInteriorImages']);
    Route::get('/admin/hotels/branches/images/building/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getBuildingImages']);
    Route::get('/admin/hotels/branches/images/view/get/{branch_id}', [HotelBranchImagesAdminController::class, 'getViewImages']);

    Route::delete('/admin/hotels/branches/images/delete/{id}', [HotelBranchImagesAdminController::class, 'deleteImage']);
});



/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room Category API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/room_categories/add', [RoomCategoryController::class, 'add']);
    Route::patch('/admin/hotels/room_categories/edit', [RoomCategoryController::class, 'edit']);
    Route::delete('/admin/hotels/room_categories/delete/{category_id}', [RoomCategoryController::class, 'delete']);
    Route::patch('/admin/hotels/room_categories/deactivate/{category_id}', [RoomCategoryController::class, 'deactivate']);
    Route::post('/admin/hotels/room_categories/images/room/add', [RoomCategoryController::class, 'addRoomImages']);
    Route::post('/admin/hotels/room_categories/images/view/add', [RoomCategoryController::class, 'addViewImages']);

    Route::get('/admin/hotels/room_categories/images/room/get/{category_id}', [RoomCategoryController::class, 'getRoomImages']);
    Route::get('/admin/hotels/room_categories/images/view/get/{category_id}', [RoomCategoryController::class, 'getViewImages']);

    Route::get('/admin/hotels/room_categories/get/id/{category_id}', [RoomCategoryController::class, 'get']);
    Route::get('/admin/hotels/room_categories/get/{branch_id}', [RoomCategoryController::class, 'getAllSingleBranch']);
    Route::get('/admin/hotels/room_categories/get', [RoomCategoryController::class, 'getAll']);
    Route::get('/admin/hotels/room_categories/get/{branch_id}/{category_id}', [RoomCategoryController::class, 'getSingle']);
});


/*
|----------------------------------------------------------------------------------------------------------------------------------------------------
| Hotel >> Branch >> Room Category >> Roms API
|----------------------------------------------------------------------------------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/hotels/rooms/add', [RoomController::class, 'add']);
    Route::get('/admin/hotels/rooms/get', [RoomController::class, 'getAll']);
    Route::get('/admin/hotels/rooms/get/{id}', [RoomController::class, 'get']);
    Route::get('/admin/hotels/rooms/get/branch_rooms_table/{branch_id}', [RoomController::class, 'getBranchRoomsTable']);
    Route::get('/admin/hotels/rooms/get/{category_id}', [RoomController::class, 'getByCategoryId']);
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
