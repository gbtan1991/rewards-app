<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // SHOW LOGIN FORM

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // HANDLE LOGIN LOGIC

   public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
        $admin = Auth::guard('admin')->user();

        // 🔎 Check if account is not active
        if ($admin->account_status !== 'active') {
            $status = $admin->account_status; // e.g. "pending", "suspended", etc.

            Auth::guard('admin')->logout();

            return back()->withErrors([
                'username' => "Your account is {$status}. Please contact the administrator.",
            ])->onlyInput('username');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome back, ' . $admin->username);
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->onlyInput('username');
}


    // LOGOUT

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.showLoginForm');
}

}
