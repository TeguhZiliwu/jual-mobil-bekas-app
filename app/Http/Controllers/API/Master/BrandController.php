<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BrandController extends BaseController
{
    //show
    public function show(Request $request)
    {
        try {
            $request_data = $request->only('keyword');

            $result = DB::table("brands AS A")->select('A.id', 'A.name', 'A.description', 'A.created_by', 'B.full_name AS created_by_name', 'A.created_at', 'A.updated_by', 'C.full_name AS updated_by_name', 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.description', 'like', '%' . $keyword . '%');
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
            $request_data = $request->only('name', 'description');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'name' => 'required|max:100|unique:brands,name,' . $request->name,
                'description' => 'required|max:100'
            ]);

            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Brand::create($final_field);
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
            $request_data = $request->only('name', 'description', 'id');
            $final_field = $request_data;
            $ruleValidation = [
                'id' => 'required|integer|exists:brands,id',
                'name' => 'required|max:100|unique:brands,name,' . $request->id, ',id',
                'description' => 'required|max:100'
            ];

            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            $validator = Validator::make($request_data, $ruleValidation);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Brand::where('id', $request->id)->update($final_field);
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
                'id' => 'required|integer|exists:brands,id',
            ]);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Brand::where('id', $request_data["id"])->delete();
            $message = $result ? 'Delete data successfully!' : 'Something wrong when deleting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function brand_list(Request $request)
    {
        try {
            $result = DB::table("brands AS A")->select('A.id AS value', 'A.name AS description')->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
