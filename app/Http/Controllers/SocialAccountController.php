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
   * @param [type] $provider [description]
   *
   * @return [type]           [social page]
   */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * [callback home page]
     *
     * @param SocialAccountRepository $service  []
     * @param Variable                $provider [description]
     *
     * @return function                          [description]
     */
    public function callback(SocialAccountRepository $service, $provider)
    {
        $user = $service->registerLoginSocialAccount(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
