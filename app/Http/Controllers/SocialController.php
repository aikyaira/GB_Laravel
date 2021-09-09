<?php

namespace App\Http\Controllers;

use App\Contracts\SocialContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(/*string $social*/)
    {
        return Socialite::driver('vkontakte')->redirect();
    }
    public function callback(SocialContract $social)
    {
        $user = Socialite::driver('vkontakte')->user();
        if ($social->saveUser($user)) {
            return redirect(RouteServiceProvider::ACCOUNT);
        }

    }
}
