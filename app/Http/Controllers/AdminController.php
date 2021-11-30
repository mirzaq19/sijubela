<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('dashboard.admin.login');
    }
    public function dashboard()
    {
        return view('dashboard.admin.dashboard');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'admin_username' => 'required',
            'admin_password' => 'required',
        ]);

        if (Auth::guard('admin_user')->attempt(['admin_username' => $credentials['admin_username'], 'password' => $credentials['admin_password']])) {
            $request->session()->regenerate();
            
            return redirect()->intended('/admin-dashboard');
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout(Request $request){
        Auth::guard('admin_user')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('beranda');
    }
}
