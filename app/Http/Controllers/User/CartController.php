<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Offer;

class CartController extends Controller
{
    public function index() {

        $user = Auth::user();
        // dd($user);
        return view('auth.user.pages.cart-offers', compact('user'));

    }
    public function store(Request $request)
    {   
        $user = auth()->user();
        $user->offers()->sync($request->carts);
        return response()->json(["message"=>"Done"]);
    }
}
