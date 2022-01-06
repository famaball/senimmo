<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $user = User::where(['email' => $request->email])->first();
        if(!$user || $request->password != $user->password){
            return redirect('login');
        }

        // Retrive Input
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
            // if success login

           // return redirect('/info');
        //    return redirect()->intended('welcome')
        //                 ->withSuccess('Signed in');

            //return redirect()->intended('/details');
        // }
        // if failed login
        // return redirect('login');
        return redirect()->intended('welcome')
                        ->withSuccess('Signed in');
    }

    public function create()
    {
      return view('form');
    }
}
