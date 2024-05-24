<?php

namespace App\Http\Controllers\API\Transaction;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Transaction\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends BaseController
{
    //show
    public function review(Request $request)
    {
        try {
            $auth_user = Auth::user();
            
            $result = DB::table("transactions AS A")->select('A.id AS transaction_id', 'A.userid', 'A.item_id', 'B.name AS item_name', 'B.description', 'B.status AS item_status', 'A.status', 'B.price', 'B.fuel_type', 'B.total_seat', 'B.cc')->join('items AS B', 'A.item_id', '=', 'B.id')->leftJoin('users AS C', 'C.id', '=', 'A.userid')->where('A.userid', $auth_user->userid)->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //create
    public function post_review(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('item_id', 'rating_service', 'rating_quality', 'rating_website_experience', 'comment');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'item_id' => 'required|exists:items,id',
                'rating_service' => 'required|integer',
                'rating_quality' => 'required|integer',
                'rating_website_experience' => 'required|integer',
                'comment' => 'nullable|max:1000'
            ]);

            $final_field['created_by'] = $auth_user->userid;
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) Review::create($final_field);
            $message = $result ? 'Submit data successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //show
    public function get_rating_review(Request $request)
    {
        try {
            $auth_user = Auth::user();
            
            $result = DB::table("reviews AS A")->select('A.id', 'A.item_id', 'C.full_name', 'A.comment', 'B.description', 'A.rating_service', 'A.rating_quality', 'A.rating_website_experience', 'A.created_by', 'A.created_at')->join('items AS B', 'A.item_id', '=', 'B.id')->join('users AS C', 'A.created_by', '=', 'C.userid')->get();

            return $this->sendResponse($result, 'Data retrieved successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
