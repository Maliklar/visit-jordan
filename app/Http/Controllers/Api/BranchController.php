<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            dump($building_img);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
