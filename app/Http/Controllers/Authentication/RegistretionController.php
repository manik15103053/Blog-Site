<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistretionController extends Controller
{
    public function register(){
        return view('backend.auth.registration');
    }
    public function adminRegistration(Request $request){

        // dd($request->all());
        $this->validate($request,[
            'name'      => 'required|max:50',
            'username'  => 'required|max:65',
            'email'     => 'required|unique:users,email',
            'password'  => 'required|min:3|max:11|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->pasword);
        $user->save();
        return redirect()->route('login')->with(['mgs' => 'Registration Successfully']);
    }
}
