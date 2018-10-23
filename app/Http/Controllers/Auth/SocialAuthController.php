<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

class SocialAuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
            return redirect('/');
        } else {
        try {
            $user = Socialite::driver('google')->user();
            $create                  = new User;
            $create->name            = $user->name;
            $create->email           = $user->email;
            $create->google_id       = $user->id;
            $create->avatar          = $user->avatar;
            $create->avatar_original = $user->avatar_original;
            $create->save();
            Auth::loginUsingId($create->id);

            return redirect('/');

        } catch (Exception $e) {

            return $e;

        }
    }
}
}

