<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('authen.login',[
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){
        // dd($request->all());
        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ])) {
            return redirect()->route('home');
        } else {
            Session::flash('error', 'Email, Password không đúng');

            return redirect()->back();
        }
    }

    public function registerForm(){
        return view('authen.register',[
            'title' => 'Register'
        ]);
    }

    public function register(UserRequest $request)
    {
        $user = User::Register($request);
        Session::flash('success', 'Đăng ký thành công');

        return redirect()->route('login');
    }
    
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    } 
}
