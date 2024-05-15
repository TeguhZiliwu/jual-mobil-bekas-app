<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\SupplierContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SupplierContactController extends BaseController
{
    //show
    public function show(Request $request)
    {
        try {
            $request_data = $request->only('keyword');

            $result = DB::table("supplier_contacts AS A")->select('A.code', 'A.name', 'A.supplier_code', 'A.phone_number', 'A.email', 'A.address', 'A.remark', 'D.name AS supplier_name', 'A.created_by', DB::raw("IFNULL(CONCAT(B.first_name, ' ', B.last_name), A.created_by) AS created_by_name"), 'A.created_at', 'A.updated_by', DB::raw("IFNULL(CONCAT(C.first_name, ' ', C.last_name), A.updated_by) AS updated_by_name"), 'A.updated_at')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->join('suppliers AS D', 'A.supplier_code', '=', 'D.code')->where('A.is_active', true)->where('D.is_active', true)->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('A.code', 'like', '%' . $keyword . '%')
                    ->orWhere('A.name', 'like', '%' . $keyword . '%')
                    ->orWhere('A.email', 'like', '%' . $keyword . '%')
                    ->orWhere('A.address', 'like', '%' . $keyword . '%')
                    ->orWhere('D.description', 'like', '%' . $keyword . '%')
                    ->orWhere('D.name', 'like', '%' . $keyword . '%');
            })->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    static function generateCode()
    {
        $currentDate = date('ym'); // Get current date in 'YYMMDD' format  
        $lastId = DB::table('supplier_contacts')->where('code', 'like', 'SPLCON' . $currentDate . '%')->max('code');
        $lastNumber = intval(substr($lastId, 10));
        $newNumber = $lastNumber + 1;
        $formattedNumber = sprintf('%04d', $newNumber);
        $newCode = 'SPLCON' . $currentDate . $formattedNumber;

        return $newCode;
    }

    //create
    public function create(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('name', 'supplier_code', 'phone_number', 'email', 'address', 'remark');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'name' => 'required|max:100|unique:supplier_contacts,name,' . $request->name . ',is_active',
                'supplier_code' => 'required|exists:suppliers,code',
                'phone_number' => 'required|max:13',
                'email' => 'nullable|unique:supplier_contacts,email|max:100|email:rfc,dns',
                'address' => 'max:500',
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

            $result = (bool) SupplierContact::create($final_field);
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
            $request_data = $request->only('name', 'supplier_code', 'phone_number', 'email', 'address', 'remark');
            $final_field = $request_data;
            $ruleValidation = [
                'name' => 'required|max:100|unique:supplier_contacts,name,' . $request->code. ',code,is_active,1',
                'supplier_code' => 'required|exists:suppliers,code,is_active,1',
                'phone_number' => 'max:13',
                'email' => 'nullable|max:100|email:rfc,dns|unique:supplier_contacts,email,' . $request->name . ',name',
                'address' => 'max:500',
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

            $result = (bool) SupplierContact::where('code', $request->code)->update($final_field);
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
                'code' => 'required|max:20|exists:supplier_contacts,code',
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

            $result = (bool) SupplierContact::where('code', $request_data["code"])->update($final_field);
            $message = $result ? 'Delete data successfully!' : 'Something wrong when deleting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
