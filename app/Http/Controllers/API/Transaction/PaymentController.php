<?php

namespace App\Http\Controllers\API\Transaction;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\Cart;
use App\Models\Master\Item;
use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentController extends BaseController
{

    //show
    public function payment_list(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('keyword');
            
            $result = DB::table("transactions AS A")->select('A.id', 'A.userid', 'C.full_name', 'A.item_id', 'A.date', 'A.price', 'A.payment_method', 'A.status', 'A.receipt_of_payment', 'C.id AS transacton_id', 'A.item_id', 'B.name AS item_name', 'B.description', 'B.status', 'B.price', 'B.fuel_type', 'B.total_seat', 'B.cc')->join('items AS B', 'A.item_id', '=', 'B.id')->join('users AS C', 'A.userid', '=', 'C.userid')->where('A.Status', 'Processing')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('C.full_name', 'like', '%' . $keyword . '%')
                    ->orWhere('B.name', 'like', '%' . $keyword . '%');
            })->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //show
    public function sales_report(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('keyword');
            
            $result = DB::table("transactions AS A")->select('A.id', 'A.userid', 'C.full_name', 'A.item_id', 'A.date', 'A.price', 'A.payment_method', 'A.status AS transaction_status', 'A.receipt_of_payment', 'C.id AS transacton_id', 'A.item_id', 'B.name AS item_name', 'B.description', 'B.status AS item_status', 'B.price', 'B.fuel_type', 'B.total_seat', 'B.cc')->join('items AS B', 'A.item_id', '=', 'B.id')->join('users AS C', 'A.userid', '=', 'C.userid')->where(function ($query) use ($request_data) {
                $keyword = $request_data['keyword'];
                $query->where('C.full_name', 'like', '%' . $keyword . '%')
                    ->orWhere('B.name', 'like', '%' . $keyword . '%');
            })->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //show
    public function approve_payment(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('transaction_id');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'transaction_id' => 'required|exists:transactions,id',
            ]);

            $final_field['status'] = "DONE";
            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            $transacton_data = Transaction::where('id', $request_data["transaction_id"])->get();

            unset($final_field['transaction_id']);
            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Transaction::where('id', $request->transaction_id)->update($final_field);          
            Item::where('id', $transacton_data->first()->item_id)->update([
                'status' => "SOLD",
                'updated_by' => $auth_user->userid,
                'updated_at' => now()
            ]);
                 
            Cart::where('item_id', $transacton_data->first()->item_id)->delete();

            $message = $result ? 'Payment approved successfully!' : 'Something wrong when approve the payment! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //show
    public function reject_payment(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('transaction_id');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'transaction_id' => 'required|exists:transactions,id',
            ]);

            $final_field['status'] = "REJECTED";
            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();

            $transacton_data = Transaction::where('id', $request_data["transaction_id"])->get();

            unset($final_field['transaction_id']);
            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Transaction::where('id', $request->transaction_id)->update($final_field);          
            Item::where('id', $transacton_data->first()->item_id)->update([
                'status' => "OPEN",
                'updated_by' => $auth_user->userid,
                'updated_at' => now()
            ]);
                 
            // Cart::where('item_id', $transacton_data->first()->item_id)->delete();

            $message = $result ? 'Payment approved successfully!' : 'Something wrong when approve the payment! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
