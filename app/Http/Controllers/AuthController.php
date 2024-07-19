<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pembelian;
use App\Models\Parfum;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('user_admin')->where('email', $email)->first();

        if ($user && $user->password === $password) {
            Auth::loginUsingId($user->id);
            return redirect()->route('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function pembelians()
    {
        $pembelians = Pembelian::with('parfum')->get();
        return view('admin.pembelians', compact('pembelians'));
    }

    public function barangs()
    {
        $barangs = Parfum::all();
        return view('admin.barangs', compact('barangs'));
    }
}
