<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('employee.dashboard');
    }

    public function login()
    {
        return view('employee.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->has('remember_me'))) {

            return redirect()->route('employee.dashboard');
        }

        return redirect()->route('employee.login');
    }

    public function logout()
    {
        Auth::guard('auth:employee')->logout();
    }
}
