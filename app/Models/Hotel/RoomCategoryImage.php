<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'cateogry_id',
        'type',
        'image',
    ];

    public function room()
    {
        return $this->hasMany(RoomCategoryImage::class, 'category_id', 'id')->where('type', 'room');
    }

    public function view()
    {
        return $this->hasMany(RoomCategoryImage::class, 'category_id', 'id')->where('type', 'view');
    }
}
