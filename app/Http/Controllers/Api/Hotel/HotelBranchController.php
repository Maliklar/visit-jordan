<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelBranchImage;
use App\Models\HotelBranch;
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
    // public function add(Request $request)
    // {
    //     $user = Auth::user();
    //     if ($user->type->type == 'hotel') {
    //         $validated = $request->validate([
    //             'views_img' => 'required|max:4',
    //             'views_img.*' => 'mimes:jpg,jpeg,png,bmp',
    //             'building_img' => 'required|max:4',
    //             'building_img.*' => 'mimes:jpg,jpeg,png,bmp',
    //             'interior_img' => 'required|max:4',
    //             'interior_img.*' => 'mimes:jpg,jpeg,png,bmp',
    //             'city_id' => 'required',
    //         ]);



    //         $hotel_id = Hotel::where('user_id', $user->id)->first()->id;


    //         HotelBranch::create([
    //             'hotel_id' => $hotel_id,
    //             'user_id' => $user->id,
    //             'city_id' => $request->city_id,
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'map_location' => $request->map_location,
    //             'location_description' => $request->location_description,
    //             'swimming_pool' => $request->swimming_pool,
    //             'resturant' => $request->resturant,
    //             'gym' => $request->gym,
    //             'laundry' => $request->laundry,
    //         ]);


    //         $views_img = $request->file('views_img');
    //         foreach ($views_img as $image) {
    //             $name_gen = hexdec(uniqid());
    //             $img_ext = strtolower($image->getClientOriginalExtension());
    //             $imgName = $name_gen . '.' . $img_ext;
    //             $upload_location = 'images/hotles/';
    //             $last_img = $upload_location . $imgName;
    //             $image->move($upload_location, $imgName);
    //             HotelBranchImage::create([
    //                 'image' => $last_img,
    //                 'type' => 'views',
    //                 'hotel_id' => $hotel_id,
    //             ]);
    //         }
    //         $rooms_img = $request->file('rooms_img');
    //         foreach ($rooms_img as $image) {
    //             $name_gen = hexdec(uniqid());
    //             $img_ext = strtolower($image->getClientOriginalExtension());
    //             $imgName = $name_gen . '.' . $img_ext;
    //             $upload_location = 'images/hotles/';
    //             $last_img = $upload_location . $imgName;
    //             $image->move($upload_location, $imgName);
    //             HotelBranchImage::create([
    //                 'image' => $last_img,
    //                 'type' => 'rooms',
    //                 'hotel_id' => $hotel_id,
    //             ]);
    //         }
    //         $building_img = $request->file('building_img');
    //         foreach ($building_img as $image) {
    //             $name_gen = hexdec(uniqid());
    //             $img_ext = strtolower($image->getClientOriginalExtension());
    //             $imgName = $name_gen . '.' . $img_ext;
    //             $upload_location = 'images/hotles/';
    //             $last_img = $upload_location . $imgName;
    //             $image->move($upload_location, $imgName);
    //             HotelBranchImage::create([
    //                 'image' => $last_img,
    //                 'type' => 'building',
    //                 'hotel_id' => $hotel_id,
    //             ]);
    //         }
    //     } else {
    //         return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
    //     }
    // }

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

    public function addInteriorImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $request->validate([
                'interior_img' => 'required|max:4',
                'interior_img.*' => 'mimes:jpg,jpeg,png,bmp',
                'branch_id' => 'required',
            ]);

            $interior_img = $request->file('interior_img');
            foreach ($interior_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelBranchImage::create([
                    'image' => $last_img,
                    'type' => 'interior',
                    'branch_id' => $request->branch_id,
                ]);
            }
            return response(['message' => 'Interior Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addBuildingImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $request->validate([
                'building_img' => 'required|max:4',
                'building_img.*' => 'mimes:jpg,jpeg,png,bmp',
                'branch_id' => 'required',
            ]);

            $interior_img = $request->file('building_img');
            foreach ($interior_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelBranchImage::create([
                    'image' => $last_img,
                    'type' => 'building',
                    'branch_id' => $request->branch_id,
                ]);
            }
            return response(['message' => 'Building Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addViewImages(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $request->validate([
                'view_img' => 'required|max:4',
                'view_img.*' => 'mimes:jpg,jpeg,png,bmp',
                'branch_id' => 'required',
            ]);

            $interior_img = $request->file('view_img');
            foreach ($interior_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelBranchImage::create([
                    'image' => $last_img,
                    'type' => 'view',
                    'branch_id' => $request->branch_id,
                ]);
            }
            return response(['message' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
