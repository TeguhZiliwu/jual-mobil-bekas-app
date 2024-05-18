<?php

namespace App\Http\Controllers\API\Transaction;

use App\Http\Controllers\API\BaseController;
use App\Models\Master\Item;
use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends BaseController
{

    //show
    public function get_cart(Request $request)
    {
        try {
            $auth_user = Auth::user();
            
            $result = DB::table("carts AS A")->select('A.id', 'A.userid', 'C.id AS transacton_id', 'A.item_id', 'B.name AS item_name', 'B.description', 'B.status AS item_status', DB::raw("IFNULL(C.status, B.status) AS status"), 'B.price', 'B.fuel_type', 'B.total_seat', 'B.cc')->join('items AS B', 'A.item_id', '=', 'B.id')->leftJoin('transactions AS C', function($join) {
                $join->on('A.userid', '=', 'C.userid')
                     ->on('A.item_id', '=', 'C.item_id');
            })->where('A.userid', $auth_user->userid)->where('B.status', '<>', 'SOLD')->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //buy
    public function buy(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('item_id', 'payment_method');
            $item_data = Item::where('id', $request_data["item_id"])->get();
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'item_id' => 'required|exists:items,id',
                'payment_method' => 'required|in:Cash,Transfer',
            ]);

            $final_field['userid'] = $auth_user->userid;
            $final_field['item_id'] = $request_data["item_id"];
            $final_field['date'] = now();
            $final_field['price'] = $item_data->first()->price;
            $final_field['payment_method'] = $request_data["payment_method"];
            $final_field['status'] = "AWAITING PAYMENT";
            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Transaction::create($final_field);
            Item::where('id', $request->item_id)->update([
                'status' => "AWAITING PAYMENT",
                'updated_by' => $auth_user->userid,
                'updated_at' => now()
            ]);
            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    

    //create
    public function upload_receipt(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('transaction_id', 'item_id', 'receipt_of_payment');
            $final_field = $request_data;

            $validator = Validator::make($request_data, [
                'item_id' => 'required|exists:items,id',
                'transaction_id' => 'required|exists:transactions,id',
                // 'receipt_of_payment' => 'required|file|max:2048|mimes:jpeg,jpg,png,pdf,doc,docx,xlsx',
            ]);

            $status = "PROCESSING";

            $final_field['id'] = $request->transaction_id;
            $final_field['status'] = $status;
            $final_field['updated_by'] = $auth_user->userid;
            $final_field['updated_at'] = now();
            unset($final_field['receipt_of_payment']);
            
            if ($request->hasFile('receipt_of_payment')) {       
                $uniqid = uniqid();
                $fileName = $uniqid . "." . $request->receipt_of_payment->getClientOriginalExtension();
                $request->receipt_of_payment->move(public_path('assets/images/receipts/'), $fileName);
                $final_field["receipt_of_payment"] = $fileName;
            }

            unset($final_field['transaction_id']);
            unset($final_field['item_id']);
            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }
    
            $result = (bool) Transaction::where('id', $request->transaction_id)->update($final_field);
            
            Item::where('id', $request->item_id)->update([
                'status' => $status,
                'updated_by' =>  $auth_user->userid,
                'updated_at' => now()
            ]);

            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
