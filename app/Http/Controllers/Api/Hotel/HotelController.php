<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class HotelController extends Controller
{

    /**
     * __________________________________________________________________________________________________
     * 
     * Admin Methods
     * __________________________________________________________________________________________________
     */
    public function auth()
    {
        $user =  Auth::user();
        if ($user->type->type == 'hotel') {
            return Auth::user();
        } else {
            return response(['message' => 'You are not a hotel admin'], Response::HTTP_UNAUTHORIZED);;
        }
    }
    public function register(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:50|min:3',
                'email' => 'required|unique:users|email:rfc,dns',
                'password' => 'required|min:8',
            ]
        );
        $insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => 3, // hotel
            'password' => Hash::make($request->password),
        ]);

        Hotel::create([
            'user_id' => $insert->id
        ]);
        return response("Hotel Admin User Created");
    }
    public function adminUpdate(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate(
                [
                    'name' => 'required|max:50|min:3',
                    'tagline' => 'required|max:5000|min:3',
                    'website' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                ]
            );

            // Check if logo is added previously
            $hotel = Hotel::where('user_id', $user->id)->first();
            if ($hotel->logo === null && ($request->logo == "null")) {
                return response(['message' => "Hotel logo is required"], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            // Update all data except for the logo
            if ($hotel->logo !== null && $request->logo == "null") {
                Hotel::where('user_id', $user->id)->update([
                    'name' => $request->name,
                    'tagline' => $request->tagline,
                    'website' => $request->website,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'user_id' => $user->id,
                ]);
            }
            // update everything
            else {
                dump('here');
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
            }


            return response(['message' => 'Hotel data updated successfully']);
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
