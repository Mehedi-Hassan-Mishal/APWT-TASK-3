<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function admin_edit()
    {
        return view('admin_edit');
              
    }

    public function Update(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:4|max:100',
            'email'=>'required|email',
        ],
        [
         'name.required'=>'Please Input a Name.',
         'name.string'=>'Please Input string value.',
         'name.min'=>'Must be Longer than 4 characters.',
         'name.max'=>'Too much lengthy.',
        ]);

        $id=Auth::user()->id;

        User::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return Redirect()->back()->with('success','Profile updated');
    }
    
}
