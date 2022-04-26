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
        'category_id',
        'branch_id',
        'payment_id',
        'check_in',
        'check_out',
        'days',
    ];

    public function category()
    {
        return $this->hasOne(RoomCategory::class, 'id', 'category_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function payment()
    {
        return $this->hasOne(HotelPayment::class, 'id', 'payment_id');
    }
}
