<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function index() {

        $user = Auth::user();
        // dd($user);
        return view('auth.user.pages.cart-offers', compact('user'));

    }
}
