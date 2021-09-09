<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (isset($event->user) && $event->user instanceof User) {
            $user = $event->user;
            $event->user->last_login_at = now();
            $user->save();
        }
    }
}
