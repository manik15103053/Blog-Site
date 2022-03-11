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

        $this->validate($request,[
            'name'              => 'required|max:50',
            'username'          => 'required|max:65',
            'email'             => 'required|unique:users,email',
            'password'          => 'required|min:6|max:11',
            'confirm_password'  => 'required|same:password'
        ],[
            'confirm_password.required' => 'The Confirm field is required',
            'confirm_password.same'     => 'The confirm password and password must match'
        ]);

        $user = new User();

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->pasword);
        $user->save();
        return redirect()->route('dashboard')->with(['mgs' => 'Registration Successfully']);
    }
}
