<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class HotelsController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate(
            [
                // 'name' => 'required|max:50|min:3',
                'email' => 'required|unique:users|email:rfc,dns',
                'password' => 'required|min:8',
            ]
        );

        $insert = User::create([
            'name' => "some name",
            'email' => $request->email,
            'user_type' => 3, // hotel
            'password' => Hash::make($request->password),
        ]);

        Hotel::create([
            'user_id' => $insert->id
        ]);

        return response("Normal user created successfully");
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        //sending a cookie that contains token
        $cookie = cookie('jwt', $token, 60 * 24); //1 day


        if ($user->type->type == 'hotel') {
            return response([
                'authenticated' => 'as hotel',
                'message' => $token,
            ])->withCookie($cookie);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function adminUpdate(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $validated = $request->validate(
                [
                    'name' => 'required|max:50|min:3',
                    'tagline' => 'required|max:5000|min:3',
                    'logo' => 'required',
                    'website' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                ]
            );

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $imgName = $name_gen . '.' . $img_ext;
            $upload_location = 'images/hotles/logo/';
            $last_img = $upload_location . $imgName;
            $image->move($upload_location, $imgName);

            Hotel::create([
                'name' => $request->name,
                'tagline' => $request->tagline,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'logo' => $last_img,
                'user' => $user->id,
            ]);
        } else {
            return response(['message' => 'You are not an hotel'], Response::HTTP_UNAUTHORIZED);;
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $validated = $request->validate(
                [
                    'name' => 'required|max:50|min:3',
                    'tagline' => 'required|max:5000|min:3',
                    'website' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'logo' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
                ]
            );

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $imgName = $name_gen . '.' . $img_ext;
            $upload_location = 'images/hotles/logo/';
            $last_img = $upload_location . $imgName;
            $image->move($upload_location, $imgName);

            Hotel::where('user_id', $user->id)->update([
                'name' => $request->name,
                'tagline' => $request->tagline,
                'website' => $request->website,
                'email' => $request->email,
                'phone' => $request->phone,
                'logo' => $last_img,
                'user_id' => $user->id,
            ]);
        } else {
            return response(['message' => 'You are not an hotel'], Response::HTTP_UNAUTHORIZED);;
        }
    }

    public function auth()
    {
        $user =  Auth::user();
        if ($user->type->type == 'hotel') {
            return Auth::user();
        } else {
            return response(['message' => 'You are not an hotel'], Response::HTTP_UNAUTHORIZED);;
        }
    }

    public function getAdmin()
    {
        $user =  Auth::user();
        if ($user->type->type == 'hotel') {
            //look if user has a hotel
            $hotelData = Hotel::where('user_id', $user->id)->get();
            if ($hotelData->isEmpty()) {
                return response(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);;
            }
            return $hotelData[0];
        } else {
            return response(['message' => 'You are not an hotel'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
