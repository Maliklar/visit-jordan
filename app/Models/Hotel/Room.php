<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'branch_id',
        'category_id',
        'available',
    ];
}
