<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\SocialContract;
use Laravel\Socialite\Contracts\User;
use App\Models\User as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialService implements SocialContract
{
    protected function pwdGenerate(): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle($chars), 0, 8);
    }
    public function saveUser(User $user)
    {
        $currentUser = Model::whereEmail($user->getEmail())->first();
        if ($currentUser) {
            $currentUser->name = $user->getName();
            $currentUser->avatar = $user->getAvatar();
            $currentUser->save();
            return Auth::loginUsingId($currentUser->id);
        } else {
            $password=$this->pwdGenerate();
            $currentUser = Model::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
                'password'=> Hash::make($password)
            ]);
            Auth::loginUsingId($currentUser->id);
            return redirect()->route('account')->with('message', $password);
        }

    }
}
