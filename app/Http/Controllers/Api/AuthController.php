<?php

namespace App\Http\Controllers\Api;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    // Redirect to 
    public function redirectToProvider($provider)
    {
        // return response()->json($provider, 200);
        // Redirect to the provider's authentication page
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function getRedirectUrl($provider)
    {
        $redirectUrl = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();
        return response()->json(['url' => $redirectUrl]);
    }

    // Handle callback from 
    public function handleProviderCallback($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
        // $user = Socialite::driver($provider)->stateless()->user();
        // Handle user info (register/login logic)
        // return response()->json(['user' => $user]);
    }
}
