<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(){
    	return view('auth.login');
    }

    public function postLogin(Request $request){
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('/dashboard');
    	}
    	// Message
    	return redirect('/')->with('errors', 'Username atau Password anda Salah!');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/');
    }
}
