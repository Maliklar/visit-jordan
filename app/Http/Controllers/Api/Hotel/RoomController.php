<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\HotelPayment;
use App\Models\HotelReservation;
use App\Models\Room;
use App\Models\RoomReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
                    'reservation_id' => '0',
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
                ->with('category', 'branch')
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
                ->with('category', 'branch')
                ->get();
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getReservations()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomReservation::where('room_id', request()->id)
                ->get();
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

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
                'check_out' => $check_out,
                'days' => $difference,
            ]);


            return response(['message' => 'Good']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getBranchRoomsTable()
    {
        $user = Auth::user();

        if ($user->type->type == 'hotel') {
            $data = DB::table('rooms')
                ->select(DB::raw('count(*) as total, category_id ,
                 count(case available when 0 then 1 else null end) as booked,
                 count(case available when 1 then 1 else null end) as free,
                 count(case active when 1 then 1 else null end) as Inactive,
                 count(case active when 0 then 1 else null end) as active'))
                ->groupBy('category_id')
                ->get();
            // dump($data);
            return $data;
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
