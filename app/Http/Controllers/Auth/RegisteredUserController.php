<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
        ], [
            'email.unique' => 'Email already exists',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.lowercase' => 'Email must be in lowercase',
            'email.email' => 'Invalid email format',
            'email.max' => 'Email must not exceed 255 characters',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 8 characters long',
            'password_confirmation.same' => 'Password confirmation must match password',
            'password_confirmation.required' => 'Password confirmation is required',
            // 'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice')->with('success', 'Registrasi Berhasil. Silahkan cek email untuk verifikasi');
        }

        // return redirect(route('dashboard', absolute: false));
        return redirect()->intended(route('guest.dashboard', absolute: false))->with('success', 'Registrasi Berhasil');
    }
}
