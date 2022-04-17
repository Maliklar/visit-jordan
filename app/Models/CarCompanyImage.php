<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCompanyImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tagline',
        'website',
        'email',
        'phone',
        'logo',
        'user',
        'user_id'
    ];
}
