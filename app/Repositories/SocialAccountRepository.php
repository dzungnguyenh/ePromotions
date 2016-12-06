<?php

namespace App\Repositories;

use Laravel\Socialite\Contracts\Provider;
use App\Models\SocialAccount;
use App\User;

class SocialAccountRepository
{
    public function createOrGetUser(Provider $provider)
    {
        $ROLE_USER = 2;
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
                    'role_id' => $ROLE_USER,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
