<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    //signin
    public function sign_in(Request $request)
    {
        try {
            $request_data = $request->only('userid', 'password');
            $final_field = $request_data;
            $ruleValidation = [
                'userid' => 'required|max:50|exists:users,userid',
                'password' => 'required|min:6|max:100',
            ];

            $validator = Validator::make($request_data, $ruleValidation);
            
            if ($validator->fails()) {
                $message = 'Invalid User ID or Password. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }
            
            $user = User::where('userid', $request->userid)->first();

            if(Hash::check($request->password, $user->password)){
                Auth::attempt($final_field);
                $auth_user = Auth::user(); 
                $token = $auth_user->createToken("JualMobilBekas")->plainTextToken;
                $result = [
                    'token' => $token,
                    'userid' => "$user->first_name $user->last_name"
                ];
                $cookie = Cookie::make('token', $token, config('auth.token_lifetime'));
       
                return $this->sendResponse($result, 'User Sign In successfully.')->withCookie($cookie);
            } 
            else{ 
                $message = 'Invalid User ID or Password. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            } 
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //create
    public function sign_up(Request $request)
    {
        try {
            $auth_user = Auth::user();
            $request_data = $request->only('userid', 'password', 'full_name', 'email', 'phone_number');
            $final_field = $request_data;
            
            $validator = Validator::make($request_data, [
                'userid' => 'required|max:50|unique:users,userid,' . $request->userid,
                'password' => 'required|min:6|max:100',
                'full_name' => 'required|max:100',
                'email' => 'required|unique:users,email|max:100|email:rfc,dns',
                'phone_number' => 'required|max:13|unique:users,phone_number',
            ]);

            $final_field['password'] = bcrypt($final_field['password']);
            $final_field['role'] = 'User';
            $final_field['created_by'] = 'System';
            $final_field['created_at'] = now();

            if ($validator->fails()) {
                $message = 'Invalid data provided. Please review and try again.';
                $message_type = 'warning';
                $validation_message = $validator->errors();
                return $this->sendResponse(null, $message, false, $message_type, $validation_message);
            }

            $result = (bool) User::create($final_field);
            $message = $result ? 'Sign up successfully!' : 'Something wrong when submitting the data! Please contact the administrator!';

            return $this->sendResponse($result, $message);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public static function generateTokenId()
    {
        $tokenName = "JualMobilBekas";
        // Get the current date
        $currentDate = Carbon::now()->format('ymd');
        
        // Get the last token ID generated for the current day
        $lastTokenId = DB::table('personal_access_tokens')
            ->where('name', 'like', "{$tokenName}-{$currentDate}%")
            ->orderBy('name', 'desc')
            ->value('name');

        // Extract the running number
        $lastNumber = 0;
        if ($lastTokenId !== null) {
            $lastNumber = intval(substr($lastTokenId, -4));
        }

        // Increment the running number
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        
        // Generate the new token ID
        return "{$tokenName}-{$currentDate}{$newNumber}";
    }
    
    //signout
    public function sign_out(Request $request)
    {
        try {
            auth()->guard('web')->logout();
            
            return $this->sendResponse(true, 'User Sign Out successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
