<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HomeBannerController extends Controller
{
    public function add(Request $request)
    {
        $user =  Auth::user();
        if ($user->type->type == 'admin') {
            $validate = $request->validate([
                'title' => 'required|unique:home_banners',
                'subtitle' => 'required|unique:home_banners',
                'video' => 'required|mimes:mp4,mov,ogg,qt | max:20000',
            ]);

            $video = $request->file('video');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($video->getClientOriginalExtension());
            $imgName = $name_gen . '.' . $img_ext;
            $upload_location = 'assets/videos/';
            $last_img = $upload_location . $imgName;
            $video->move($upload_location, $imgName);

            HomeBanner::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'video' => $last_img,
            ]);
        } else {
            return response(['message' => 'You are not an admin'], Response::HTTP_UNAUTHORIZED);;
        }
    }
}
