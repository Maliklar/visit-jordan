<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchFoodAndDrinksService extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'branch_id',
        'fruits',
        'wine_champagne',
        'special_diet_menus',
        'breakfast_in_the_room',
        'resturant',
    ];
}
