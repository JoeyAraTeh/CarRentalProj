<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogAdminLogin
{
    public function handle(Login $event)
    {
        $user = $event->user;

        if ($user->is_admin) {
            \Log::info("🛡️ Admin {$user->name} has logged in.");
        }
    }
}
