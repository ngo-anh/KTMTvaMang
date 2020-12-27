<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use  App\Http\Controllers\Roles\AdminController;
use  App\Http\Controllers\Roles\UserController;

class LoginController extends Controller
{
    /*  */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $level = Auth::user()->level;
            if ($level == 1) {
                /* Admins */
                return redirect()->route('index');
            } else if ($level == 0) {
                /* Users */
                return redirect()->route('index');
            }
        } else {
            $errors = trans('auth.failed');
            return view('auth.login', ['Errors' => $errors]);
        }
    }
}
