<?php

namespace App\Http\Controllers\Api\User\Hotel;

use App\Http\Controllers\Controller;
use App\Models\HotelPayment;
use App\Models\Room;
use App\Models\RoomReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoomController extends Controller
{
    public function reserve(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'user') {

            // First Make Payment API Here
            // If payment is successful insert to payment table and then make reservation table

            //find empty room

            $room = Room::where('category_id', $request->category_id)
                ->where('available', true)
                ->where('active', true)
                ->where('reservation_id', 0)->first();

            $payment = HotelPayment::create([
                'user_id' => $user->id,
                "hotel_id" => $request->hotel_id,
                "branch_id" => $request->branch_id,
                'room_id' => $room->id,
                'amount' => $request->amount,
            ]);
            $check_in = Carbon::createFromDate($request->check_in);
            $check_out = Carbon::createFromDate($request->check_out);

            $difference = ($check_in->diff($check_out)->days < 1)
                ? 1
                : $check_in->diffInDays($check_out);

            RoomReservation::create([
                'user_id' => $user->id,
                'payment_id' => $payment->id,
                'room_id' => $room->id,
                'check_in' => $check_in,
                "hotel_id" => $request->hotel_id,
                "branch_id" => $request->branch_id,
                'check_out' => $check_out,
                'days' => $difference,
            ]);


            return response(['message' => 'Good']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
