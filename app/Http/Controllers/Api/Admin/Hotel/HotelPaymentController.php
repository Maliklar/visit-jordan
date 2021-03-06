<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HotelPaymentController extends Controller
{
    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $reservations = HotelPayment::where('hotel_id', $hotel_id)
                ->with('branch', 'category', 'user')
                ->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getById()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $reservations = HotelPayment::where('hotel_id', $hotel_id)
                ->where('id', request()->id)
                ->with('branch', 'category', 'user')
                ->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getByRoomId()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $reservations = HotelPayment::where('hotel_id', $hotel_id)
                ->where('room_id', request()->room_id)
                ->with('branch', 'category', 'user')
                ->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getByCategoryId()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $reservations = HotelPayment::where('hotel_id', $hotel_id)
                ->where('category_id', request()->category_id)
                ->with('branch', 'category', 'user')
                ->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getByBranchId()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;
            $reservations = HotelPayment::where('hotel_id', $hotel_id)
                ->where('branch_id', request()->branch_id)
                ->with('branch', 'category', 'user')
                ->get();
            return $reservations;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
