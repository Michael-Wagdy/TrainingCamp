<?php

namespace App\Observers;
use App\User;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Auth;

class MailObserver
{   
    // Once the user is created he will recevie welcome mail message
        
<<<<<<< HEAD
    /*public function created(User $user)
=======
    public function created(User $user)
>>>>>>> 3e850ea00a58fa276142ceab506c0aa2e09b23dc
    {   
        if(!(request()->is("admin*")))
        
        {
            $user_email = $user->email;
        
            Mail::to($user_email)->send(new WelcomeEmail($user));
        }

       
<<<<<<< HEAD
    }*/
=======
    }
>>>>>>> 3e850ea00a58fa276142ceab506c0aa2e09b23dc
}
