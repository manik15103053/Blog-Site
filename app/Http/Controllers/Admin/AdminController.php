<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

    public function index(){
        return view('backend.home');
    }
    public function loginForm(){
        return view('backend.auth.admin-login');
    }
    public function storeLogin(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'email'    => 'required',
            'password' => 'required'
        ]);
        $check = $request->only('email','password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.dashboard')->with('success','Welcome to Dashboard');
        }else{
            return redirect()->back()->with('error','Login Falied');
        }

    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
