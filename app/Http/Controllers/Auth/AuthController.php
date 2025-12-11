<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Login Form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Process Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => __('validation.required', ['attribute' => __('Email')]),
            'email.email' => __('validation.email', ['attribute' => __('Email')]),
            'password.required' => __('validation.required', ['attribute' => __('Password')]),
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/client/dashboard');
            }
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    // Show Register Form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Process Registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string',
            'address' => 'required|string',
        ], [
            'name.required' => __('validation.required', ['attribute' => __('Name')]),
            'email.required' => __('validation.required', ['attribute' => __('Email')]),
            'email.email' => __('validation.email', ['attribute' => __('Email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('Email')]),
            'password.required' => __('validation.required', ['attribute' => __('Password')]),
            'password.min' => __('validation.min.string', ['attribute' => __('Password'), 'min' => 8]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('Password')]),
            'phone.required' => __('validation.required', ['attribute' => __('Phone')]),
            'address.required' => __('validation.required', ['attribute' => __('Address')]),
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'client',
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);

        Auth::login($user);

        return redirect('/client/dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}