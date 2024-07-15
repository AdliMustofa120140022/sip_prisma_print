<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $intended = $request->session()->get('url.intended', '');

        if (Auth::user()->role == 'super_admin') {
            if (Str::contains($intended, '/super')) {
                // dd($intended);
                return redirect()->intended(route('super.dashboard', absolute: false));
            }
            return redirect()->route('super.dashboard');
        } elseif (Auth::user()->role == 'admin') {
            if (Str::contains($intended, '/admin')) {
                // dd($intended);
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }
            return redirect()->route('admin.dashboard');
        }
        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
