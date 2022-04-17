<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarBranch;
use App\Models\CarCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CarBranchController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'car') {
            // $validated = $request->validate([
            // ]);

            dump($request->all());

            $company_id = CarCompany::where('user_id', $user->id)->first()->id;


            CarBranch::create(array_merge($request->all(), ['company_id' => $company_id, 'user_id' => $user->id]));
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
