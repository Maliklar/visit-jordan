<?php

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
| Hotels Users
|--------------------------------------------------------------------------
*/

// Admin
Route::middleware('auth:sanctum')->group(function () {
    Route::post('hotels/login', [HotelsController::class, 'login']);
    Route::post('hotels/register', [HotelsController::class, 'register']);
});
