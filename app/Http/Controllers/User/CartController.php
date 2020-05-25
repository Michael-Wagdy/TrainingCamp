<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
<<<<<<< HEAD
use App\User;
use App\Offer;
=======
>>>>>>> 3e850ea00a58fa276142ceab506c0aa2e09b23dc

class CartController extends Controller
{
    public function index() {

        $user = Auth::user();
        // dd($user);
        return view('auth.user.pages.cart-offers', compact('user'));

    }
<<<<<<< HEAD
    public function store(Request $request)
    {   
        $user = auth()->user();
        $user->offers()->sync($request->carts);
        return response()->json(["message"=>"Done"]);
    }
=======
>>>>>>> 3e850ea00a58fa276142ceab506c0aa2e09b23dc
}
