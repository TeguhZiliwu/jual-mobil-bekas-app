<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\Cart;
use App\Models\Master\Item;
use App\Models\Master\ItemPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ItemController extends BaseController
{
    //show
    public function show(Request $request)
    {
        try {
            $request_data = $request->only('keyword');

            $result = DB::table("items AS A")->select('A.id', 'A.brand_id', 'D.name AS brand_name', 'A.status', 'A.name', 'A.description', 'A.cc', 'A.fuel_type', 'A.transmission_type', 'A.total_seat', 'A.price', 'A.year', 'A.created_by', 'B.full_name AS created_by_name', 'A.created_at', 'A.updated_by', 'C.full_name AS updated_by_name', 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->join('brands AS D', 'A.brand_id', '=', 'D.id')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.description', 'like', '%' . $keyword . '%')
                    ->orWhere('D.name', 'like', '%' . $keyword . '%');
            })->where('A.status', '<>', 'SOLD')->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //show
    public function get_car_for_sale(Request $request)
    {
        try {
            $request_data = $request->only('brand_id', 'fuel_type', 'seat_type', 'keyword');

            $result = DB::table("items AS A")->select('A.id', 'A.brand_id', 'D.name AS brand_name', 'A.status', 'A.name', 'A.description', 'A.cc', 'A.fuel_type', 'A.transmission_type', 'A.total_seat', 'A.price')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->join('brands AS D', 'A.brand_id', '=', 'D.id')->where('status', 'OPEN')->where(function ($query) use ($request_data) {
                $brand_id = $request_data['brand_id'];
                $fuel_type = $request_data['fuel_type'];
                $seat_type = $request_data['seat_type'];
                if ($brand_id != '') {
                    $query->where('A.brand_id', $brand_id);
                }
                if ($fuel_type != '') {
                    $query->where('A.fuel_type', $fuel_type);
                }
                if ($seat_type != '') {
                    $query->where('A.total_seat', $seat_type);
                }
            })->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.fuel_type', 'like', '%' . $keyword . '%')
                    ->orWhere(DB::raw("CONCAT(A.total_seat, ' Seats')"), 'like', '%' . $keyword . '%')
                    ->orWhere('A.description', 'like', '%' . $keyword . '%')
                    ->orWhere('D.name', 'like', '%' . $keyword . '%');
            })->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //create
    public function create(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('brand_id', 'name', 'description', 'cc', 'fuel_type', 'total_seat', 'transmission_type', 'price', 'year');
            $final_field = $request_data;

            $validator = Validator::make($request_data, [
                'brand_id' => 'required|exists:brands,id',
                'name' => 'required|max:100|unique:items,name,' . $request->name,
                'description' => 'required|max:100',
                'cc' => 'required|integer',
                'fuel_type' => 'required|max:100',
                'total_seat' => 'required|integer',
                'transmission_type' => 'required|in:Manual,Matic',
                'year' => 'required|numeric',
                'price' => 'required|regex:/^\d{1,15}(\.\d{1,3})?$/'
            ]);


            $final_field['status'] = 'OPEN';
            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $item = Item::create($final_field);

            // Check if the record was recently created
            $result = $item->wasRecentlyCreated;

            if ($request->hasFile('photo')) {
                $allowedfileExtension = ['jpeg', 'jpg', 'png'];
                $files = $request->file('photo');
                foreach ($files as $index => $file) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $uniqid = uniqid();
                    $finalName = "{$request->name}_{$uniqid}.{$extension}";
                    $check = in_array($extension, $allowedfileExtension);

                    if (!$check) {
                        $validationPhoto = false;
                    } else {
                        $file->move(public_path('assets/images/items/'), $finalName);
                        $result = (bool) ItemPhoto::create([
                            'item_id' => $item->id,
                            'name' => $finalName,
                            'created_by' =>  $auth_user->userid,
                            'created_at' => now()
                        ]);
                    }
                }
            }

            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //update
    public function update(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('id', 'brand_id', 'name', 'description', 'cc', 'fuel_type', 'total_seat', 'price', 'transmission_type', 'photo', 'photo_removed', 'year');
            $final_field = $request_data;
            $ruleValidation = [
                'id' => 'required|exists:items,id',
                'name' => 'required|max:100|unique:items,name,' . $request->id . ',id',
                'description' => 'required|max:100',
                'brand_id' => 'required|exists:brands,id',
                'cc' => 'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
                'price' => 'required|regex:/^\d{1,15}(\.\d{1,3})?$/',
                'fuel_type' => 'required|max:100',
                'transmission_type' => 'required|in:Manual,Matic',
                'year' => 'required|numeric',
                'photo_removed' => 'nullable|array',
                'photo_removed.*' => 'nullable|string',
                'total_seat' => 'required|integer'
            ];

            // $requestFile = $request->file('photo')->getClientOriginalName();
            // $requestFileName = pathinfo($requestFile, PATHINFO_FILENAME) . '.' . $request->photo->getClientOriginalExtension();

            // $exisitingPhotoName = Item::where('code', $request->code)->value('photo');
            // $oldImage = public_path('assets/images/items/') . $exisitingPhotoName;

            // if ($request->photo->getClientOriginalExtension() != "") {
            //     if (File::exists($oldImage)) {
            //         File::delete($oldImage);
            //     }
            // }

            $validator = Validator::make($request_data, $ruleValidation);
            $validationPhoto = true;

            unset($final_field['photo']);
            unset($final_field['photo_removed']);
            if ($request->hasFile('photo')) {
                $allowedfileExtension = ['jpeg', 'jpg', 'png'];
                $files = $request->file('photo');
                foreach ($files as $index => $file) {

                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();

                    if ($extension != "") {
                        $uniqid = uniqid();
                        $finalName = "{$request->name}_{$uniqid}.{$extension}";
                        $check = in_array($extension, $allowedfileExtension);

                        if (!$check) {
                            $validationPhoto = false;
                        } else {
                            $file->move(public_path('assets/images/items/'), $finalName);
                            $result = (bool) ItemPhoto::create([
                                'item_id' => $request->id,
                                'name' => $finalName,
                                'created_by' =>  $auth_user->userid,
                                'created_at' => now()
                            ]);
                        }
                    }
                }
            }

            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            if ($validator->fails() || !$validationPhoto) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            if ($request->has('photo_removed') && is_array($request->photo_removed) && !empty($request->photo_removed)) {
                foreach ($request->photo_removed as $index => $photo) {
                    $filePath = 'assets/images/items/' . $photo;
                    $result = (bool) ItemPhoto::where('item_id', $request_data["id"])->where('name', $photo)->delete();

                    if (File::exists($filePath)) {
                        // Delete the file
                        File::delete($filePath);
                    }
                }
            }

            $result = (bool) Item::where('id', $request->id)->update($final_field);
            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //delete
    public function delete(Request $request)
    {
        try {
            $request_data = $request->only('id');

            $validator = Validator::make($request_data, [
                'id' => 'required|max:20|exists:items,id',
            ]);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Item::where('id', $request_data["id"])->delete();
            $message = $result ? 'Delete data successfully!' : 'Something wrong when deleting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //delete
    public function get_photo(Request $request)
    {
        try {
            $request_data = $request->only('id');

            $validator = Validator::make($request_data, [
                'id' => 'required|max:20|exists:items,id',
            ]);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = ItemPhoto::where('item_id', $request_data["id"])->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //create
    public function add_to_cart(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('item_id');
            $final_field = $request_data;

            $validator = Validator::make($request_data, [
                'item_id' => 'required|exists:items,id'
            ]);

            $final_field['userid'] = $auth_user->userid;
            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $exists = Cart::where('userid', $auth_user->userid)
                ->where('item_id', $request_data["item_id"])
                ->exists();

            $result = true;
            if (!$exists) {
                $result = (bool) Cart::create($final_field);
            }
            $message = $result ? 'Car added successfully to cart!' : 'Something wrong when adding to cart! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
