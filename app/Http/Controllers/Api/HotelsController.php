<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
                'name' => 'required|max:50|min:3',
                'email' => 'required|unique:users|email:rfc,dns',
                'password' => 'required|min:8',
            ]
        );

        $insert = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 3, // hotel
            'password' => Hash::make($request->password),
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

    public function auth()
    {

        $user =  Auth::user();
        if ($user->type->type == 'hotel') {
            return Auth::user();
        } else {
            return response(['message' => 'You are not an hotel'], Response::HTTP_UNAUTHORIZED);;
        }
    }
}
