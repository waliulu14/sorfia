<?php


// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin'); // Pastikan file Blade berada di resources/views/admin.blade.php
    }

    public function kategori()
    {
        return view('kategori'); // Pastikan file Blade berada di resources/views/kategori.blade.php
    }

    public function daftarPembelian()
    {
        return view('daftar_pembelian'); // Pastikan file Blade berada di resources/views/daftar_pembelian.blade.php
    }

    public function dataParfum()
    {
        return view('data_parfum'); // Pastikan file Blade berada di resources/views/data_parfum.blade.php
    }
}
