<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRegisteredController extends Controller
{
    public function create()
    {
        return view('register');
    }


    public function store(Request $request) {


       $request->validate([
            'username' => ['required','string','max:25'],
            'fullname' => ['required','string','max:225'],
            'email' => ['required','email:dns','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
            'role',
        ]);



        $register = User::create([
            "username"=> $request->username,
            "fullname"=> $request->fullname,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
            "role"=> $request->role,
        ]);

        Auth::login($register);

        if(Auth::check()) {
            return redirect('home')->with('status_create', 'Berhasil login!');

        }
            return redirect('home')->with('status_delete', 'Gagal Register!');

    }


    public function login(Request $request) {
        // User::where([
        //     "email"=> $request->email,
        //     "password"=> $request->password,
        //     ])->firstorfail();

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(Auth::check()) {
            return redirect('home')->with('status_create', 'Berhasil login!');

        }
            return redirect('home')->with('status_delete', 'Gagal login!');


        // if(count($log)>0) {
        //     return redirect('home')->with('status_create', 'Berhasil login!');
        // } else {
        //     return redirect('auth.login')->with('status_create', 'Coba lagi!');
        // }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('status_create', 'Anda telah logout!');
    }
}
