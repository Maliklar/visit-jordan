<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'type' => 1,
            'password' => Hash::make($request->password),
        ]);
        return response("Normal user created successfully");
    }
}
