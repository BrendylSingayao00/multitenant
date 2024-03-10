<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $tenantCount = Tenant::count();
        $userCount = User::count();

        return view('dashboard.index', compact('tenantCount', 'userCount'));
    }
}