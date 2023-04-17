<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CustomerRegistrationRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('employee.dashboard');
    }

    public function login(Request $request)
    {
        return view('customer.login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->has('remember_me'))) {

            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('customer.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('auth:customer')->logout();
    }

    public function register(Request $request)
    {
        return view('customer.register');
    }

    public function handleRegister(CustomerRegistrationRequest $request)
    {
        $customer = Customer::create($request->safe()->all());

        if ($customer instanceof Customer) {
            event(new Registered($customer));
        }
    }
}
