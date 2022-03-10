<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=> $request->password,$request->remember])){
        $request->session()->regenerate();
        if(auth()->user()->role_id == 1){
            return redirect()->route('dashboard');
        }elseif(auth()->user()->role_id == 2){
            return redirect()->route('registration.form');
        }else{
            return redirect()->back();
        }
       }else{
        return redirect()->back()->with('msg','Your creditional is invalid');
       }

    }
}
