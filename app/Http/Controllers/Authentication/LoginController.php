<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function loginForm(){
        return view('backend.auth.login');
    }
    public function storeLogin(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'email'    => 'required',
            'password' => 'required'
        ]);
        $check = $request->only('email','password');
        if(Auth::guard('web')->attempt($check)){
            return redirect()->route('user.dashboard')->with('success','Welcome to Dashboard');
        }else{
            return redirect()->back()->with('error','Login Falied');
        }

    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('frontend.home');
    }
}
