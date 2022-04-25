<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use App\Models\HotelBranchImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HotelBranchImagesAdminController extends Controller
{
    public function addInterior(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'interior',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'Interior Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addBuilding(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'building',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'building Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addView(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 1,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],

                );
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 2,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 3,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                HotelBranchImage::updateOrCreate(
                    [
                        'type' => 'view',
                        'number' => 4,
                        'branch_id' => $request->branch_id,
                    ],
                    ['image' => $last_img,],
                );
            }

            return response(['message' => 'view Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getInterior()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'interior')->get();
            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getBuilding()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'building')->get();
            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getView()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return HotelBranchImage::where('branch_id', request()->branch_id)
                ->where('type', 'view')->get();

            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function delete()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            HotelBranchImage::where('id', request()->id)->delete();

            return response(['message' => 'Image Deleted Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
