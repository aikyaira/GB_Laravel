<?php

namespace App\Http\Controllers;

use App\Contracts\SocialContract;
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

        $social->saveUser(Socialite::driver('vkontakte')->user());
    }
}
