<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBranch extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'user_id',
        'city_id',
        'map_location',
        'name',
        'location_description',
        'email',
        'phone',
        'swimming_pool',
        'resturant',
        'gym',
        'laundry',
    ];

    public function building()
    {
        return $this->hasMany(HotelBranchImage::class, 'branch_id', 'id')->where('type', 'building');
    }

    public function interior()
    {
        return $this->hasMany(HotelBranchImage::class, 'branch_id', 'id')->where('type', 'interior');
    }

    public function views()
    {
        return $this->hasMany(HotelBranchImage::class, 'branch_id', 'id')->where('type', 'view');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
    public function foodAndDrinkService()
    {
        return $this->hasOne(BranchFoodAndDrinksService::class, 'branch_id', 'id');
    }
}
