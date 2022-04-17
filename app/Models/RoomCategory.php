<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'branch_id',
        'user_id',
        'name',
        'description',
        'capacity',
        'single_beds',
        'double_beds',
        'rooms',
        'bathrooms',
        'wifi',
        'balcony',
        'price',
        'tv',
        'lunch',
        'active'
    ];
}
