<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'user_id',
        'name',
        'description',
        'price',
        'capacity',
        'single_beds',
        'double_beds',
        'rooms',
        'bathrooms',
        'wifi',
        'balcony',
        'tv',
        'lunch',
    ];
}
