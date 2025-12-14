<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(Request $request, $tenant)
    {
        return view('tenant.auth.login', [
            'tenant' => $tenant,
        ]);
    }

    public function login(Request $request, $tenant)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('tenant')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // 👈 clave

            $tenant = $request->route('tenant'); // ya viene bindeado
            return redirect()->route('tenant.dashboard', ['tenant' => $tenant->slug]);
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    public function logout(Request $request, $tenant)
    {
        Auth::guard('tenant')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('tenant.login', [
            'tenant' => $tenant,
        ]);
    }
}
