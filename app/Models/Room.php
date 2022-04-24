<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'branch_id',
        'category_id',
        'available'
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(HotelBranch::class, 'branch_id', 'id');
    }
}
