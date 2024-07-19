<?php

// app/Http/Controllers/ParfumController.php

namespace App\Http\Controllers;

use App\Models\Parfum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParfumController extends Controller
{
    public function index()
    {
        $parfums = Parfum::all();
        return view('home', compact('parfums'));
    }

    public function show($id)
    {
        $parfum = Parfum::findOrFail($id);
        return view('detail', compact('parfum'));
    }

    public function pembelianForm($id)
    {
        $parfum = Parfum::findOrFail($id);
        return view('pembelians.create', compact('parfum'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/');
            } else {
                return back()->withErrors([
                    'email' => 'Email atau password salah.',
                ]);
            }
        }
        return view('login'); // Tampilkan form login
    }
}
