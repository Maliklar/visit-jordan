<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
                'count' => 'required',
                'category_id' => 'required',
            ]);


            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            for ($i = 0; $i < $request->count; $i++) {
                Room::create([
                    'hotel_id' => $hotel_id,
                    'branch_id' => $request->branch_id,
                    'category_id' => $request->category_id,
                ]);
            }

            return response(['message' => 'Rooms Added Successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getAll(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            return Room::where('hotel_id', $hotel_id)
                ->with('category')
                ->get();
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getByCategoryId(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            return Room::where('hotel_id', $hotel_id)
                ->where('category_id', request()->category_id)
                ->with('category')

                ->get();
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
