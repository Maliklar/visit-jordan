<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchServicesCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_id',
        'branch_id',
        'name',
        'additional_charge',
    ];
}
