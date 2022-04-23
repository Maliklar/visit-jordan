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
        'branch',
        'bathrooms',
        'wifi',
        'balcony',
        'price',
        'tv',
        'lunch',
        'active'
    ];

    public function room()
    {
        return $this->hasMany(RoomCategoryImage::class, 'category_id', 'id')->where('type', 'room');
    }

    public function view()
    {
        return $this->hasMany(RoomCategoryImage::class, 'category_id', 'id')->where('type', 'view');
    }

    public function branch()
    {
        return $this->belongsTo(HotelBranch::class, 'branch_id', 'id');
    }
}
