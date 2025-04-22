<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $module = 'dashboard';
        return view('admin.dashboard.dashboard', ['module'=>$module]);
    }
}
