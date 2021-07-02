<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function loginAdmin(){
        if(auth()->check()){
            return redirect()->route('home');
        }
        return view('login');
    }
    public function postLoginAdmin(Request $request){
        
        $remember = $request->has('remember_me')?true:false;
        // if(auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->has('password'),
        // ],$remember)){//auth có sẵn cửa laravel để kiểm tra login có hợp lệ hay không
        //     return redirect()->route('home');
        // }
        // else{
        //     echo "false";
        // }
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ])){//auth có sẵn cửa laravel để kiểm tra login có hợp lệ hay không
            return redirect()->route('home');
        }
        else{
            echo "false";
        }
    }
}
