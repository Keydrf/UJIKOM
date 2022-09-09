<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginproses(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        } else{
            return redirect()->back()->with('password', 'password salah');
        }

        return \redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ],[
            'name.required' => 'harus di isi',
            'name.unique' => 'nama sudah dipakai',
            'email.unique' => 'email sudah dipakai',
            'email.required' => 'harus di isi',
            'password.required' => 'harus di isi',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect()->route('login')->with('success', 'Berhasil Register');
    }

    public function logout()
    {
        Auth::logout();
        return \redirect('login');
    }
}
