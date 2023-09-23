<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index() {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else if ($role === 'user') {
            return redirect()->route('user.dashboard');
        }
    }

    public function admin() {
        $breadcrumbs = [
            ['Dashboard', route('admin.dashboard')],
            ['Index', route('logout')],
        ];
        $breadcrumb_active = 'Blank Page';

        return view('admin.dashboard.index', compact('breadcrumbs', 'breadcrumb_active'));
    }

    public function user() {
        $breadcrumbs = [
            ['Dashboard', route('admin.dashboard')],
            ['Index', route('logout')],
        ];
        $breadcrumb_active = 'Blank Page';

        return view('user.dashboard.index', compact('breadcrumbs', 'breadcrumb_active'));
    }

    public function image() {
        dd(Str::uuid());
    }
}
