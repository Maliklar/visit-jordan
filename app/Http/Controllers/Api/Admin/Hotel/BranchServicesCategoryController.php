<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\BranchServicesCategory;
use Illuminate\Http\Request;

class BranchServicesCategoryController extends Controller
{
    public function get()
    {
        return BranchServicesCategory::all();
    }
}
