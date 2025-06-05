<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ExternalStudent;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $students = ExternalStudent::all(); // or ::wh
        return view('admin.index');
    }
    public function profile()
    {
        return view('admin.profile.index');
    }
}
