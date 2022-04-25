<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoomReservationAdminController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            // Get array of all branches
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;


            $reservations = RoomReservation::where('hotel_id', $hotel_id)->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
