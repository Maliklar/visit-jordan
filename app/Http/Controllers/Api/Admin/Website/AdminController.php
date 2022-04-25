<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }


        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        //sending a cookie that contains token
        $cookie = cookie('jwt', $token, 60 * 24); //1 day


        if ($user->type->type == 'admin') {
            return response([
                'authenticated' => 'as admin',
                'message' => $token,
            ])->withCookie($cookie);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function auth()
    {

        $user =  Auth::user();
        if ($user->type->type == 'admin') {
            return Auth::user();
        } else {
            return response(['message' => 'You are not an admin'], Response::HTTP_UNAUTHORIZED);;
        }
    }
}
