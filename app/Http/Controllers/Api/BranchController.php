<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
                'views_img.*' => 'mimes: jpg, jpeg, png',
                'building_img' => 'required|max:4',
                'building_img.*' => 'mimes: jpg, jpeg, png',
                'rooms_img' => 'required|max:4',
                'rooms_img.*' => 'mimes: jpg, jpeg, png',
            ]);

            // $views = $request->file('views_img');
            // foreach ($views as $file) {
            // }
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
