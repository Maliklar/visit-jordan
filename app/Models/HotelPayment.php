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

    public function category()
    {
        return $this->hasOne(RoomCategory::class, 'id', 'category_id');
    }
    public function branch()
    {
        return $this->hasOne(HotelBranch::class, 'id', 'branch_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
