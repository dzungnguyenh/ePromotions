<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SocialAccountRepository;
use Socialite;

class SocialAccountController extends Controller
{
  /**
   * [redirect to social page]
   *
   * @param [Provider] $provider []
   *
   * @return [void]           [social page]
   */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * [callback home page]
     *
     * @param SocialAccountRepository $service  []
     * @param Provider                $provider []
     *
     * @return void                          [home page]
     */
    public function callback(SocialAccountRepository $service, $provider)
    {
        $user = $service->registerLoginSocialAccount(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
