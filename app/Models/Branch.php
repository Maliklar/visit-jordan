<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
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
}
