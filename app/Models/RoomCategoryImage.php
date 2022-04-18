<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'type',
        'category_id',
        'number',
    ];
}
