<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\UnitOfMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UnitOfMeasurementController extends BaseController
{
    //show
    public function show(Request $request)
    {
        try {
            $request_data = $request->only('keyword');
            // $reqData = $request->only('user_login', 'search');

            // $validator = Validator::make($reqData, [
            //     'search' => 'nullable|string',
            //     'user_login' => 'required|max:50|exists:users,user_id'
            // ]);

            // if ($validator->fails()) {

            //     (new ErrorLogController)->save_error_log($validator->errors(), "User", "show()", $request->user_login);
            //     return response()->json([
            //         'success' => false,
            //         'message' => "Invalid request parameter."
            //     ], 200);
            // }

            $result = DB::table("units_of_measurement AS A")->select('A.code', 'A.name', 'A.description', 'A.remark', 'A.created_by', DB::raw("IFNULL(CONCAT(B.first_name, ' ', B.last_name), A.created_by) AS created_by_name"), 'A.created_at', 'A.updated_by', DB::raw("IFNULL(CONCAT(C.first_name, ' ', C.last_name), A.updated_by) AS updated_by_name"), 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->where('A.is_active', true)->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.code', 'like', '%' . $keyword . '%')
                    ->orWhere('A.name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.description', 'like', '%' . $keyword . '%');
            })->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function generateCode()
    {
        $currentDate = date('ym'); // Get current date in 'YYMMDD' format  
        $lastId = DB::table('units_of_measurement')->where('code', 'like', 'UOM' . $currentDate . '%')->max('code');
        $lastNumber = intval(substr($lastId, 7));
        $newNumber = $lastNumber + 1;
        $formattedNumber = sprintf('%04d', $newNumber);
        $newCode = 'UOM' . $currentDate . $formattedNumber;

        return $newCode;
    }

    //create
    public function create(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('name', 'description', 'remark');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'name' => 'required|max:100|unique:units_of_measurement,name,' . $request->name . ',is_active',
                'description' => 'required|max:100',
                'remark' => 'max:500'
            ]);

            $final_field['code'] = $this->generateCode();
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

            $result = (bool) UnitOfMeasurement::create($final_field);
            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($this->generateCode(), $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //update
    public function update(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('name', 'description', 'remark');
            $final_field = $request_data;
            $ruleValidation = [
                'name' => 'required|max:100|unique:units_of_measurement,name,' . $request->code. ',code,is_active,1',
                'description' => 'required|max:100',
                'remark' => 'max:500',    
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

            $result = (bool) UnitOfMeasurement::where('code', $request->code)->update($final_field);
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
            $auth_user = Auth::user();
            $request_data = $request->only('code');
            $final_field = $request_data;

            $validator = Validator::make($request_data, [
                'code' => 'required|max:20|exists:units_of_measurement,code',
            ]);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $final_field['is_active'] = false;
            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            $result = (bool) UnitOfMeasurement::where('code', $request_data["code"])->update($final_field);
            $message = $result ? 'Delete data successfully!' : 'Something wrong when deleting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function uom_list(Request $request)
    {
        try {
            $result = DB::table("units_of_measurement AS A")->select('A.code AS value', 'A.name AS description')->where('A.is_active', true)->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
