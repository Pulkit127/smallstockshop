<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        $user = User::where('phone', $credentials['phone'])
            ->first();

        if ($user && Auth::attempt($credentials)) {
            return redirect()->route('index')->with('success', 'Login successful!');
        }
        return back()->with('error', 'Invalid credentials.');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login-page');
    }
}

