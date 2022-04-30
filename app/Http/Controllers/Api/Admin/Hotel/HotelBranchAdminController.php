<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\BranchFoodAndDrinksService;
use App\Models\Hotel;
use App\Models\HotelBranch;
use App\Models\HotelBranchImage;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HotelBranchAdminController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'map_location' => 'required',
                'location_description' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'city_id' => 'required',
            ]);
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $branch = HotelBranch::create([
                'hotel_id' => $hotel_id,
                'user_id' => $user->id,
                'city_id' => $request->city_id,
                'name' => 'remove it later',
                'email' => $request->email,
                'phone' => $request->phone,
                'map_location' => $request->map_location,
                'location_description' => $request->location_description,
            ]);
            BranchFoodAndDrinksService::create(['branch_id' => $branch->id]);
            return response(['message' => 'Hotel Branch Added Successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            // $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            return HotelBranch::with('building', 'interior', 'views', 'city')->where('user_id', $user->id)->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getById()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return HotelBranch::with('building', 'interior', 'views', 'city', 'foodAndDrinkService')
                ->where('user_id', $user->id)
                ->where('id', request()->id)
                ->first();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'map_location' => 'required',
                'location_description' => 'required',
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'swimming_pool' => 'required',
                'gym' => 'required',
                'city_id' => 'required',
                'resturant' => 'required',
                'laundry' => 'required',
                'branch_id' => 'required',
            ]);
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            HotelBranch::where('user_id', $user->id)
                ->where('hotel_id', $hotel_id)
                ->where('id', $request->branch_id)
                ->update([
                    'city_id' => $request->city_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'map_location' => $request->map_location,
                    'location_description' => $request->location_description,
                    'swimming_pool' => $request->swimming_pool,
                    'resturant' => $request->resturant,
                    'gym' => $request->gym,
                    'laundry' => $request->laundry,
                ]);
            return response(['message' => 'hotel updated']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }



    public function activate()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $branch_id = request()->branch_id;
            //condition
            $hasBranchImages = false;
            $hasCategory = false;
            $hasCategoryImages = false;
            $hasRoomsCategory = false;

            $branchPhotos = HotelBranchImage::where('branch_id', $branch_id)->get();
            if (sizeof($branchPhotos) >= 6) {
                $hasBranchImages = true;
            }
            $categories = RoomCategory::where('branch_id', $branch_id)->get();
            if (sizeof($categories) >= 1) {
                $hasCategory = true;
            }
            foreach ($categories as $category) {
                //Check for rooms
                $id = $category->id;
                $rooms = Room::where('category_id', $id)->get();
                if (sizeof($rooms) >= 1) {
                    $hasRoomsCategory = true;
                } else {
                    $hasRoomsCategory = false;
                    break;
                }

                //check Category Images
                $catImg = RoomCategoryImage::where('category_id', $id)->get();
                if (sizeof($catImg) >= 3) {
                    $hasCategoryImages = true;
                } else {
                    $hasCategoryImages = false;
                    break;
                }
            }
            if ($hasBranchImages && $hasCategory && $hasCategoryImages && $hasRoomsCategory) {
                return response(['message' => 'Branch Activated successfully']);
            } else {
                $errors = [];

                if ($hasCategoryImages == false) {
                    array_push($errors, 'A branch must have at least 3 Category Images ');
                }
                if ($hasCategory == false) {
                    array_push($errors, 'A branch must have at least 1 Room Category ');
                }
                if ($hasBranchImages == false) {
                    array_push($errors, 'A branch must have at least 6 Branch Images ');
                }
                if ($hasRoomsCategory == false) {
                    array_push($errors, 'A branch must have at least 1 Room in a category ');
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
        $id = request()->id;
        HotelBranch::where('id', $id)->update(['active' => 0]);
        return response(['message' => 'Branch Deactivated Successfully']);
    }

    public function delete()
    {
        $id = request()->id;
        HotelBranch::where('id', $id)->delete();
        return response(['message' => 'Branch Deleted Successfully']);
    }
}
