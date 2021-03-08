<?php

namespace App\Http\Controllers;

use App\Constants\LoginType;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            if ($user) {

                $attributes = [
                    'full_name' => $user->getName(),
                    'email_address' => $user->getEmail()
                ];

                Guest::create([
                    'loginTypeId' => LoginType::GOOGLE_ID,
                    'userId' => $user->getId(),
                    'attributes' => $attributes,
                    'date' => now()
                ]);

            }
            dd($user);

        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            if ($user) {

                $attributes = [
                    'full_name' => $user->getName(),
                    'email_address' => $user->getEmail()
                ];

                Guest::create([
                    'loginTypeId' => LoginType::FACEBOOK_ID,
                    'userId' => $user->getId(),
                    'attributes' => $attributes,
                    'date' => now()
                ]);

            }
            dd($user);

        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        try {

            $user = Socialite::driver('twitter')->user();
            if ($user) {

                $attributes = [
                    'full_name' => $user->getName(),
                    'email_address' => $user->getEmail()
                ];

                Guest::create([
                    'loginTypeId' => LoginType::TWITTER_ID,
                    'userId' => $user->getId(),
                    'attributes' => $attributes,
                    'date' => now()
                ]);

            }
            dd($user);

        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {

            $user = Socialite::driver('github')->user();
            if ($user) {

                $attributes = [
                    'full_name' => $user->getName(),
                    'email_address' => $user->getEmail()
                ];

                Guest::create([
                    'loginTypeId' => LoginType::GITHUB_ID,
                    'userId' => $user->getId(),
                    'attributes' => $attributes,
                    'date' => now()
                ]);

            }
            dd($user);

        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

}
