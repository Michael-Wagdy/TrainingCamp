<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Agency;

class AgencyLoginController extends Controller
{
    public function Login()
    {
        if (Auth::guard('agency')->attempt(['email' => request('email'), 'password' => request('password')])) 
        {

            $user = Auth::guard('agency')->user();
            $success['token'] =  $user->createToken('TokenName')->accessToken;
            return response()->json(['success' => $success], 200);
        }
       else
        {
           return response()->json(['error'=>'Unauthorised'], 401);
        }

    }
}
