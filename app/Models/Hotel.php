<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
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
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user');
    }
}
