<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Offer;
use App\Agency;
use App\Category;
use Image;

class UserHomeController extends Controller
{

    // display all categories checkboxes and offers when user login to system 
    public function index()
    {
        $offers = Offer::where('start_date','>',today())->paginate(5);
        $categories = Category::with('childs')->whereNull('parent_id')->get();
        return view('auth.user.pages.index',compact('offers','categories'));
    }

    // display data's user profile
    public function showprofile()
    {   
        $auth_user = Auth::user();
        return view('auth.user.pages.profile', compact('auth_user'));
    }
    

    public function showOfferDetails($offerId)
    {
        $offer = Offer::findOrFail($offerId);
        return view('auth.user.pages.offer-details', compact('offer'));
    }


    public function edit($userId)
    {
        $user = User::findOrFail($userId); //primary Key
        return view('auth.user.pages.edit',compact('user'));
    }

    // update user data
    public function update(Request $request)
    {
        // get data of old User
        $user = User::findOrFail($request->userId);
        // validate updated data
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable',
            
        ]);
        // save new values
        $user -> first_name = $request -> first_name;
        $user -> last_name = $request -> last_name;
        $user -> email = $request -> email;
        $user -> telephone = $request -> telephone;
        $user -> gender = $request -> gender;
        $user -> date_of_birth = $request -> date_of_birth;
        $user -> save();

        return redirect('/user/profile');
    }

    // to return the view of the change the profile picture
    public function changephoto()
    {
        $auth_user = Auth::user();
        return view ('auth.user.pages.changephoto', compact('auth_user'));
    }

    // function to change the profile picture
    public function update_avatar(Request $request)
    {
        
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return redirect('/user/profile');
    }

    public function showOffers(Request $request)
    {   
        $agencies = Agency::all();
        $offers = Offer::all();
        return view('auth.user.pages.offers',compact('offers','agencies'));
    }

    // display details of the offers
    public function showdetails($offerId)
    {
        $offer = Offer::findOrFail($offerId);
        return view('auth.user.pages.show-details', compact('offer'));
    }

    // get data from view through ajax function to get array of categories_id
    public function checkBoxCategory(Request $request)
    {   
        // check if the request came with array of categories_id or not
        if(!($request->categories))
        {   
            // array of categories_id is null so we will display all offers
            $offers = Offer::where('start_date','>',today())->get();
            return response()->json($offers); 
        }

        $categories = $request->categories;
        $offers = Offer::whereHas('categories', function ($query) use($categories) {$query->whereIn('category_id', $categories);})->get();
        return response()->json($offers);
    }
}
