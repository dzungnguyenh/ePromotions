<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SocialAccountRepository;
use Socialite;

class SocialAccountController extends Controller
{
    /**
     * Redirect to social page
     *
     * @param Provider $provider Variable
     *
     * @return void              Social page
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Rediect to home page
     *
     * @param SocialAccountRepository $service  Execute register or login social account
     * @param Provider                $provider Variable
     *
     * @return void                          Home page
     */
    public function callback(SocialAccountRepository $service, $provider)
    {
        $user = $service->registerLoginSocialAccount(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
