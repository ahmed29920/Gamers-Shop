<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccountService;


class SocialAccountController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback(SocialAccountService $profileService ,$provider)
    {
        try {
            $user =  Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->to('login');
        }

        $authUser = $profileService->findOrCreate($user , $provider);

        // dd($authUser);
        // login and remmber me next time
        auth()->login($authUser, true);

        return redirect()->to('/');
    }

}
