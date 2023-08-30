<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Authorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class AuthController extends Controller
{
    function login()
    {
        $role = Role::select('name')->get();
        return view('login', [
            $role
        ]);
    }

    function otentikasi(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $ceklogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($ceklogin)) {
            // otentikasi berhasil
            return redirect('/antrian')->with('login', 'Login Berhasil');
        } else {
            // otentikasi gagal
            return redirect('/login')->with('logerr', 'Username dan Password salah');
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    function register()
    {
        return view('/register');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role_id' => 'required'
        ], [
            'name.required' => 'Username wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukan email yang valid',
            'email.unique' => 'Email sudah ada !',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 5 karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ];

        User::create($data);

        if (Auth::attempt($data)) {
            // otentikasi berhasil
            return redirect('/login')->with('okin', 'Bikin akun berhasil');
        } else {
            // otentikasi gagal
            return redirect('/login')->with('okin', 'Bikin akun berhasil');
        }
    }
}
