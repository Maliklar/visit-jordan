<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelBranchImage;
use App\Models\HotelBranch;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\RoomCategoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HotelBranchController extends Controller
{

    public function add(Request $request)
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
            ]);
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            HotelBranch::create([
                'hotel_id' => $hotel_id,
                'user_id' => $user->id,
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
            return response(['message' => 'Hotel Branch Added Successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function getAdmin()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            // $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            return HotelBranch::with('building', 'interior', 'views', 'city')->where('user_id', $user->id)->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return HotelBranch::with('building', 'interior', 'views', 'city')
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

    public function addInteriorImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'Interior Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }


    public function deleteImage()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            HotelBranchImage::where('id', request()->id)->delete();

            return response(['message' => 'Image Deleted Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addBuildingImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'building Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addViewImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'view Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getInteriorImages()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'interior')->get();
            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getBuildingImages()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'building')->get();
            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getViewImages()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'view')->get();

            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function activate(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $request->validate([
                'branch_id' => 'required',
            ]);

            //condition
            $hasBranchImages = false;
            $hasCategory = false;
            $hasCategoryImages = false;
            $hasRoomsCategory = false;

            $branchPhotos = HotelBranchImage::where('branch_id', $request->branch_id)->get();
            if (sizeof($branchPhotos) >= 6) {
                $hasBranchImages = true;
            }
            $categories = RoomCategory::where('branch_id', $request->branch_id)->get();
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
                return response(['message' => 'Some Information are missing'], Response::HTTP_FORBIDDEN);
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

    public function deleteBranch()
    {
        $id = request()->id;
        HotelBranch::where('id', $id)->delete();
        return response(['message' => 'Branch Deleted Successfully']);
    }
}
