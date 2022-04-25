<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'hotel_id',
        'branch_id',
        'payment_id',
        'check_in',
        'check_out',
        'days',
    ];
}
