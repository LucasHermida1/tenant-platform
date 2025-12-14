<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    public function index()
    {
        return view('tenant.settings.appearance');
    }

    public function toggleTheme(Request $request)
    {
        $user = $request->user(); // auth:tenant

        $user->theme = $user->theme === 'dark' ? 'light' : 'dark';
        $user->save();

        return back();
    }
}
