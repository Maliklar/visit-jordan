<?php

namespace App\Http\Controllers\Api\User\Hotel;

use App\Http\Controllers\Controller;
use App\Models\HotelPayment;
use App\Models\Room;
use App\Models\RoomReservation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\Response;

class RoomRservationController extends Controller
{
    //Development for test only
    public function reserve(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'user') {

            // First Make Payment API Here
            // If payment is successful insert to payment table and then make reservation table

            //find empty room

            $currentDate = Carbon::now();
            // $check_in = Carbon::createFromDate($request->check_in);
            // $check_out = Carbon::createFromDate($request->check_out);

            $from = ($request->check_in);
            $to = ($request->check_out);

            // 1- get all reservations of the same category that conflict with the reservation data

            //IDs of rooms that belong to the same category and not available that day
            $occupiedRooms = RoomReservation::where('category_id', $request->category_id)
                ->whereBetween('check_in', [$from, $to])
                ->orWhereBetween('check_out', [$from, $to])
                ->where([
                    ['check_in', '<=', $from],
                    ['check_out', '>=', $to]
                ])
                ->pluck('room_id')->toArray();


            dump($occupiedRooms[0]);

            // 2- get an empty room that its id doesn't match any of the occupied

            $freeRoom = Room::whereNotIn('id', $occupiedRooms)->first();

            dump($freeRoom);


            // $room = Room::where('category_id', $request->category_id)
            //     ->where('active', true)
            //     ->where('reservation_id', 0)->first();

            // $payment = HotelPayment::create([
            //     'user_id' => $user->id,
            //     "hotel_id" => $request->hotel_id,
            //     "branch_id" => $request->branch_id,
            //     'category_id' => $room->id,
            //     'amount' => $request->amount,
            // ]);

            // $difference = ($check_in->diff($check_out)->days < 1)
            //     ? 1
            //     : $check_in->diffInDays($check_out);

            // RoomReservation::create([
            //     'user_id' => $user->id,
            //     'payment_id' => $payment->id,
            //     'room_id' => $room->id,
            //     'check_in' => $check_in,
            //     "hotel_id" => $request->hotel_id,
            //     "branch_id" => $request->branch_id,
            //     'check_out' => $check_out,
            //     'days' => $difference,
            // ]);


            return response(['message' => 'Good']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
