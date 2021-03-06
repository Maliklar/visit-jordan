<?php

namespace App\Http\Controllers\Api\Admin\Hotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\RoomCategoryImage;
use Symfony\Component\HttpFoundation\Response;

class RoomCategoryImagesAdminController extends Controller
{
    public function addView(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'category_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'view',
                    'number' => 1,
                    'category_id' => $request->category_id,
                ]);
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'view',
                    'number' => 2,
                    'category_id' => $request->category_id,

                ]);
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'view',
                    'number' => 3,
                    'category_id' => $request->category_id,
                ]);
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'view',
                    'number' => 4,
                    'category_id' => $request->category_id,
                ]);
            }

            return response(['message' => 'view Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addRoom(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'category_id' => 'required',
            ]);

            if ($request->file('image_1')) {
                $image_1 = $request->file('image_1');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'room',
                    'number' => 1,
                    'category_id' => $request->category_id,
                ]);
            }
            if ($request->file('image_2')) {
                $image_1 = $request->file('image_2');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'room',
                    'number' => 2,
                    'category_id' => $request->category_id,

                ]);
            }
            if ($request->file('image_3')) {
                $image_1 = $request->file('image_3');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'room',
                    'number' => 3,
                    'category_id' => $request->category_id,
                ]);
            }
            if ($request->file('image_4')) {
                $image_1 = $request->file('image_4');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($image_1->getClientOriginalExtension());
                $imgName = $name_gen . '.' . $img_ext;
                $upload_location = 'images/hotles/';
                $last_img = $upload_location . $imgName;
                $image_1->move($upload_location, $imgName);
                RoomCategoryImage::create([
                    'image' => $last_img,
                    'type' => 'room',
                    'number' => 4,
                    'category_id' => $request->category_id,
                ]);
            }

            return response(['message' => 'view Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getView()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return RoomCategoryImage::where('category_id', request()->category_id)
                ->where('type', 'view')->get();

            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function getRoom()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {

            return RoomCategoryImage::where('category_id', request()->category_id)
                ->where('type', 'view')->get();

            //  response(['mess age' => 'Views Images Added Successfully']);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function delete()
    {
    }
}
