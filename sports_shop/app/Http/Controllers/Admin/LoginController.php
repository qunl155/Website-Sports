<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login', [
            'title' => 'Bảng nhập hệ thống',
            'name' => 'LOGIN ADMIN'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))
        ) {
            return redirect()->route('admin');
        }
        session()->flash('error', 'Email hoặc password không đúng');
        return redirect()->back();
    }
}