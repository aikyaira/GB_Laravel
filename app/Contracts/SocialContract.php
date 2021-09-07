<?php

declare(strict_types=1);

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

interface SocialContract
{
    public function saveUser(User $user): string;
}
