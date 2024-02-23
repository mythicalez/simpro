<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => ['required', 'unique:users'],
            'name' => ['required'],
            'bagian_id' => ['required'],
            'role' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        User::create([
            'nik' => $request->nik,
            'username' => $request->username,
            'name' => $request->name,
            'bagian_id' => $request->bagian_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = is_numeric($request->input('username')) ? 'nik' : 'username';

        $remember = $request->has('remember');

        $credentials = [
            $fieldType => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, $remember)) {
            // Login berhasil
            session()->flash('alert', [
                'type' => 'success',
                'message' => 'Login berhasil! Selamat datang, ' . auth()->user()->name,
            ]);

            $request->session()->regenerate();

            return response()->json(['success' => true, 'redirect' => route('dashboard')]);
        } else {
            // Login gagal
            return response()->json(['success' => false, 'errors' => ['Username atau password salah']]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
