<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Branch extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable = [
        'hotel_id',
        'user_id',
        'map_location',
        'name',
        'location_description',
        'number_of_floors',
        'number_of_rooms',
        'email',
        'phone',
        'has_single',
        'has_double',
        'has_trible',
        'has_suite',
        'number_of_single',
        'number_of_double',
        'number_of_trible',
        'number_of_suites',
        'smoking',
        'wi_fi',
        'pets',
        'swimming_pool',
        'buffet',
        'launch_included',
        'ac',
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
