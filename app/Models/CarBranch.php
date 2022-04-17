<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'user_id',
        'map_location',
        'location_description',
        'name',
        'email',
        'phone',

    ];

    public function buildingImages()
    {
        return $this->hasMany(HotelImage::class, 'hotel_id', 'hotel_id')->where('type', 'building');
    }

    public function viewsImages()
    {
        return $this->hasMany(HotelImage::class, 'hotel_id', 'hotel_id')->where('type', 'views');
    }

    public function roomsImages()
    {
        return $this->hasMany(HotelImage::class, 'hotel_id', 'hotel_id')->where('type', 'rooms');
    }
}
