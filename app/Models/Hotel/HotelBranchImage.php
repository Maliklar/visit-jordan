<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBranchImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'type',
        'branch_id',
    ];
}
