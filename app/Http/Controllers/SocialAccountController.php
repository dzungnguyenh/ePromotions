<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\SocialAccountRepository;
use Socialite;

class SocialAccountController extends Controller
{
  public function redirect($provider)
  {
      return Socialite::driver($provider)->redirect();
  }

  public function callback(SocialAccountRepository $service, $provider)
  {
      $user = $service->createOrGetUser(Socialite::driver($provider));

      auth()->login($user);

      return redirect()->to('/home');
  }
}
