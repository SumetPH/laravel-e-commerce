<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        session()->put('admin-page', 'dashboard');
        return view('admin/dashboard');
    }
}
