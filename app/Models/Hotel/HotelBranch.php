<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'user_id',
        'citiy_id',
        'map_location',
        'location_description',
        'name',
        'email',
        'phone',
        'swimming_pool',
        'resturant',
        'gym',
        'laundry',
    ];

    public function interier()
    {
        return $this->hasMany(HotelBranchImage::class, 'branch_id', 'id')->where('type', 'interior');
    }

    public function exterier()
    {
        return $this->hasMany(HotelBranchImage::class, 'branch_id', 'id')->where('type', 'exterior');
    }
}
