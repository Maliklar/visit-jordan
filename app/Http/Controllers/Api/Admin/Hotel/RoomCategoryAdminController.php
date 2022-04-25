<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoomCategoryAdminController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'capacity' => 'required',
                'single_beds' => 'required',
                'double_beds' => 'required',
                'rooms' => 'required',
                'bathrooms' => 'required',
                'wifi' => 'required',
                'balcony' => 'required',
                'price' => 'required',
                'tv' => 'required',
                'lunch' => 'required',
            ]);
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            RoomCategory::create(array_merge($request->all(), [
                'hotel_id' => $hotel_id,
                'user_id' => $user->id,
            ]));
            return response(['message' => 'Hotel Branch Room category Added Successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'id' => 'required',
                'branch_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'capacity' => 'required',
                'single_beds' => 'required',
                'double_beds' => 'required',
                'rooms' => 'required',
                'bathrooms' => 'required',
                'wifi' => 'required',
                'balcony' => 'required',
                'price' => 'required',
                'tv' => 'required',
                'lunch' => 'required',
            ]);

            RoomCategory::where('id', $request->id)
                ->update($request->all());
            return response(['message' => 'Category updated successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('user_id', $user->id)->with('room', 'view')->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function getById()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->with('room', 'branch', 'view')->first();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function getByBranchId()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('branch_id', request()->branch_id)->with('room', 'view')->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function getByBrandAndCategoryId()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('branch_id', request()->branch_id)
                ->where('id', request()->category_id)
                ->with('room', 'view')->first();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function activate()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $category_id = request()->category_id;
            $roomsNumber = Room::where('category_id', $category_id)->count();
            $hasRooms = false;
            if ($roomsNumber >= 1) {
                $hasRooms = true;
            }
            $hasImages = false;

            $imagesNumber = RoomCategoryImage::where('category_id', $category_id)->count();

            if ($imagesNumber >= 3) {
                $hasImages = true;
            }
            if ($hasImages && $hasRooms) {
                return RoomCategory::where('id', request()->category_id)->update(['active' => true]);
            } else {
                $errors = [];

                if ($hasImages == false) {
                    array_push($errors, 'A branch must have at least 3 Category Images ');
                }
                if ($hasRooms == false) {
                    array_push($errors, 'A branch must have at least 1 Room Category ');
                }

                $errorMessage = [
                    'message' => 'Branch cannot be activated due to the following',
                    'errors' => $errors,
                ];
                return response($errorMessage, Response::HTTP_FORBIDDEN);
            }
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function deactivate()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->update(['active' => false]);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function delete()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->delete();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
