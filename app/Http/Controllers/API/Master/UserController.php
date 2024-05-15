<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ResultResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
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

            $result = DB::table("users AS A")->select('A.id', 'A.userid', 'A.full_name', 'A.email', 'A.phone_number', 'A.role', 'A.created_by', 'B.full_name AS created_by_name', 'A.created_at', 'A.updated_by', 'C.full_name AS updated_by_name', 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.full_name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.userid', 'like', '%' . $keyword . '%')
                    ->orWhere('A.email', 'like', '%' . $keyword . '%');
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
            $request_data = $request->only('userid', 'password', 'full_name', 'email', 'phone_number', 'role');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'userid' => 'required|max:50|unique:users,userid,' . $request->userid,
                'password' => 'required|min:6|max:100',
                'full_name' => 'required|max:100',
                'email' => 'required|unique:users,email|max:100|email:rfc,dns',
                'phone_number' => 'required|max:13|unique:users,phone_number',
                'role' => 'required|max:50|in:Admin,User',
            ]);

            $final_field['password'] = bcrypt($final_field['password']);
            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) User::create($final_field);
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
            $request_data = $request->only('userid', 'password', 'full_name', 'email', 'phone_number', 'role', 'is_change_password');
            $final_field = $request_data;
            $ruleValidation = [
                'userid' => 'required|max:50|exists:users,userid',
                'full_name' => 'required|max:100',
                'email' => 'required|max:100|email:rfc,dns|unique:users,email,' . $request->userid . ',userid',
                'phone_number' => 'required|max:13|unique:users,phone_number',
                'role' => 'required|max:50|in:Admin,User',
                'is_change_password' => 'required|boolean',
            ];

            unset($final_field['is_change_password']);
            $final_field['password'] = bcrypt($final_field['password']);
            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            if ($request->is_change_password) {
                $ruleValidation["password"] = 'required|min:6|max:100';
                $final_field["password"] = bcrypt($request->password);
            }

            $validator = Validator::make($request_data, $ruleValidation);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) User::where('userid', $request->userid)->update($final_field);
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
            $request_data = $request->only('userid');

            $validator = Validator::make($request_data, [
                'userid' => 'required|max:50|exists:users,userid',
            ]);

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) User::where('userid', $request_data["userid"])->delete();
            $message = $result ? 'Delete data successfully!' : 'Something wrong when deleting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
