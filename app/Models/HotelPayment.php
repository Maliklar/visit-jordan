<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'room_id',
        'hotel_id',
        'branch_id',
        'category_id',
        'amount',
        'days',
    ];
}
