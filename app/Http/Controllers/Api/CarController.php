<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CarController extends Controller
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
}
