<?php

namespace App\Repositories;

use Laravel\Socialite\Contracts\Provider;
use App\Models\SocialAccount;
use App\User;

class SocialAccountRepository
{
    /**
    * [create a new user if not exist or find user by social account if exist ]
    *
    * @param Provider $provider [provider from social account]
    *
    * @return [User]             [information of user]
    */
    public function registerLoginSocialAccount(Provider $provider)
    {
        $providerAccount = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereSocialType($providerName)
        ->whereSocialId($providerAccount->getId())
        ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
            'social_id' => $providerAccount->getId(),
            'social_type' => $providerName
            ]);

            $user = User::whereEmail($providerAccount->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerAccount->getEmail(),
                    'name' => $providerAccount->getName(),
                    'avatar' => $providerAccount->getAvatar(),
                    'role_id' => config('foo.USER_ID'),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
