<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthenticatedSessionController extends Controller
{
    public function index(): View
    {
        return view('auth.admin-auth');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if (! Auth::attempt(credentials: $request->only('email', 'password'))) {
            $user = User::where('email', $request->email)
                ->firstOrFail();

            if (!$user->is_admin) {
                return redirect()->route('admin.auth.index')->with('error', 'User is not admin');
            }

            Auth::login($user);
        }

        return redirect()->intended(route('home', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
