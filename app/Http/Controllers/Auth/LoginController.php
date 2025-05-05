<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  

    // Overriding the authenticated method to check the user role
    protected function authenticated(Request $request, $user)
    {
        // Check if the user has admin role
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');  // Redirect to admin dashboard
        }

        // Default behavior for non-admin users
        return redirect()->route('homepage');  // Or wherever you want normal users to go
    }
}

