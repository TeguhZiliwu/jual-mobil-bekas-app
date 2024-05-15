<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\Item;
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

            $result = DB::table("items AS A")->select('A.id', 'A.brand_id', 'D.name AS brand_name', 'A.status', 'A.name', 'A.description', 'A.cc', 'A.fuel_type', 'A.total_seat', 'A.price', 'A.created_by', 'B.full_name AS created_by_name', 'A.created_at', 'A.updated_by', 'C.full_name AS updated_by_name', 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->join('brands AS D', 'A.brand_id', '=', 'D.id')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.name', 'like', '%' . $keyword . '%')
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
            $request_data = $request->only('brand_id', 'name', 'description', 'cc', 'fuel_type', 'total_seat', 'price');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'brand_id' => 'required|exists:brands,id',
                'name' => 'required|max:100|unique:items,name,' . $request->name,
                'description' => 'required|max:100',
                'cc' => 'required|integer',
                'fuel_type' => 'required|max:100',
                'total_seat' => 'required|integer',
                'price' => 'required|regex:/^\d{1,15}(\.\d{1,3})?$/'
            ]);
            
            if ($request->hasFile('photo')) {
                // $fileName = $code . "." . $request->photo->getClientOriginalExtension();
                // $request->photo->move(public_path('assets/images/items/'), $fileName);
                // $final_field["photo"] = $fileName;
            }
            
            $final_field['status'] = 'OPEN';
            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }
            // if ($request->hasFile('photo')) {
            //     $fileName = time() . '_' . $request->user_id . "." . $request->photo->getClientOriginalExtension();
            //     $request->photo->move(public_path('assets/images/profile'), $fileName);
            //     $createdField["photo"] = $fileName;
            // }

            $result = (bool) Item::create($final_field);
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
            $request_data = $request->only('id', 'brand_id', 'name', 'description', 'cc', 'fuel_type', 'total_seat', 'price');
            $final_field = $request_data;
            $ruleValidation = [
                'id' => 'required|exists:items,id',
                'name' => 'required|max:100|unique:items,name,' . $request->id. ',id',
                'description' => 'required|max:100',
                'brand_id' => 'required|exists:brands,id',
                'cc' => 'required|regex:/^\d{1,8}(\.\d{1,2})?$/',
                'price' => 'required|regex:/^\d{1,15}(\.\d{1,3})?$/',
                'fuel_type' => 'required|max:100',
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
            
            // if ($request->hasFile('photo')) {                
            //     if ($request->photo->getClientOriginalExtension() != "") {
            //         $fileName = $request->code . "." . $request->photo->getClientOriginalExtension();
            //         $request->photo->move(public_path('assets/images/items/'), $fileName);
            //         $final_field["photo"] = $fileName;
            //     }
            // } else {
            //     $final_field['photo'] = null;
            // }

            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            $validator = Validator::make($request_data, $ruleValidation);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
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
}
