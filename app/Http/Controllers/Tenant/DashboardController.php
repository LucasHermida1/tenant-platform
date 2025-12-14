<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tenant = $request->route('tenant');

        return view('tenant.dashboard.index', [
            'tenant' => $tenant,
        ]);
    }
}
