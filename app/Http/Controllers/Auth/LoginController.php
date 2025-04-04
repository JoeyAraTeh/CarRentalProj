<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/homepage';

    /**
     * Handle user authentication and redirect.
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('homepage');
    }
}
