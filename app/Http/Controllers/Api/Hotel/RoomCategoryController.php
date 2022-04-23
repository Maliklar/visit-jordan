<?php

namespace App\Http\Controllers\Api\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\RoomCategoryImage;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoomCategoryController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'branch_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'capacity' => 'required',
                'single_beds' => 'required',
                'double_beds' => 'required',
                'rooms' => 'required',
                'bathrooms' => 'required',
                'wifi' => 'required',
                'balcony' => 'required',
                'price' => 'required',
                'tv' => 'required',
                'lunch' => 'required',
            ]);
            $hotel_id = Hotel::where('user_id', $user->id)->first()->id;

            RoomCategory::create(array_merge($request->all(), [
                'hotel_id' => $hotel_id,
                'user_id' => $user->id,
            ]));
            return response(['message' => 'Hotel Branch Room category Added Successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            $request->validate([
                'id' => 'required',
                'branch_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'capacity' => 'required',
                'single_beds' => 'required',
                'double_beds' => 'required',
                'rooms' => 'required',
                'bathrooms' => 'required',
                'wifi' => 'required',
                'balcony' => 'required',
                'price' => 'required',
                'tv' => 'required',
                'lunch' => 'required',
            ]);

            RoomCategory::where('id', $request->id)
                ->update($request->all());
            return response(['message' => 'Category updated successfully']);
        } else {
            return response(['message' => 'Invalid Credintials'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function addViewImages(Request $request)
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

    public function addRoomImages(Request $request)
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


    public function get()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->with('room', 'branch', 'view')->first();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function delete()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->delete();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function deactivate()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('id', request()->category_id)->update(['active' => true]);
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getAllSingleBranch()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('branch_id', request()->branch_id)->with('room', 'view')->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getViewImages()
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
    public function getRoomImages()
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
    public function getAll()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('user_id', $user->id)->with('room', 'view')->get();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function getSingle()
    {
        $user = Auth::user();
        if ($user->type->type == 'hotel') {
            return RoomCategory::where('branch_id', request()->branch_id)
                ->where('id', request()->category_id)
                ->with('room', 'view')->first();
        } else {
            return response(['message' => 'Not a hotel account'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
