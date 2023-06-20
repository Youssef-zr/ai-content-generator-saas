<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:access_dashboard')->only('statistics');
    }

    public function statistics()
    {
        return view('admin.pages.index');
    }
}
