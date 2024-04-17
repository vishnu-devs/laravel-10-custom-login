<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class AuthController extends Controller
{
    public function home()
    {
     return view('home');
    }
    public function index()
    {
     return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (\Auth::attempt($request->only('email', 'password'))) {
            return redirect('home');
        }
        
        return redirect('login')->withErrors(['error' => 'Login details are not valid']);
    }
    
    
    public function register_view()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required|email',
           'password'=>'required',
       ]);

       user::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>\Hash::make($request->password),
       ]);

       if (\Auth::attempt($request->only('email', 'password'))) {
       return redirect('home');
    }
       return redirect('register')->withError('Error');

    }

    public function logout()
    {
        \Session::flash('message', 'Data has been flashed to the session');
        // \Session::flush();
        \Auth::logout();
        return redirect('/');
    }
}

