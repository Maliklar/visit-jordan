<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $validated = $request->validate([
                'views_img' => 'required|max:4',
                'views_img.*' => 'mimes:jpg,jpeg,png,bmp',
                'building_img' => 'required|max:4',
                'building_img.*' => 'mimes:jpg,jpeg,png,bmp',
                'rooms_img' => 'required|max:4',
                'rooms_img.*' => 'mimes:jpg,jpeg,png,bmp',
            ]);



            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;


            Branch::create([
                'hotel_id' => $hotel_id,
                'user_id' => $user->id,
                'name' => $request->name,
                'number_of_floors' => $request->number_of_floors,
                'number_of_rooms' => $request->number_of_rooms,
                'email' => $request->email,
                'phone' => $request->phone,
                'has_single' => $request->has_single === 'true' ? true : false,
                'has_double' => $request->has_double === 'true' ? true : false,
                'has_trible' => $request->has_trible === 'true' ? true : false,
                'has_suite' => $request->has_suite === 'true' ? true : false,
                'number_of_single' => $request->number_of_single === 'null' ? null :  $request->number_of_single,
                'number_of_double' => $request->number_of_double === 'null' ? null : $request->number_of_double,
                'number_of_trible' => $request->number_of_trible === 'null' ? null : $request->number_of_trible,
                'number_of_suites' => $request->number_of_suites === 'null' ? null : $request->number_of_suites,
                'map_location' => $request->map_location,
                'location_description' => $request->location_description,
                'wi_fi' => $request->wi_fi === 'true' ? true : false,
                'pets' => $request->pets === 'true' ? true : false,
                'swimming_pool' => $request->swimming_pool === 'true' ? true : false,
                'buffet' => $request->buffet === 'true' ? true : false,
                'smoking' => $request->smoking === 'true' ? true : false,
                'lanuch_included' => $request->lanuch_included === 'true' ? true : false,
                'ac' => $request->ac === 'true' ? true : false,

            ]);


            $views_img = $request->file('views_img');
            foreach ($views_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelImage::create([
                    'image' => $last_img,
                    'type' => 'views',
                    'hotel_id' => $hotel_id,
                ]);
            }
            $rooms_img = $request->file('rooms_img');
            foreach ($rooms_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelImage::create([
                    'image' => $last_img,
                    'type' => 'rooms',
                    'hotel_id' => $hotel_id,
                ]);
            }
            $building_img = $request->file('building_img');
            foreach ($building_img as $image) {
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image->move($upload_location, $imgName);
                HotelImage::create([
                    'image' => $last_img,
                    'type' => 'building',
                    'hotel_id' => $hotel_id,
                ]);
            }
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            // $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            return Branch::where('user_id', $user->id)->get();
        }
    }
}
