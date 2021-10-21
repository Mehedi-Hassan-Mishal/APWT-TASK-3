<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
        return view('dashboard');
        } elseif(Auth::user()->hasRole('manager')){
            return view('manager_dashboard');
        }elseif(Auth::user()->hasRole('admin')){
            return view('admin_dashboard');
        }
    }

    public function profile()
    {
        return view('profile');
    }
}
