<?php

namespace App\Http\Controllers;

use App\Models\Parfum;
use App\Models\KategoriParfum;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $parfums = Parfum::with('kategori')->get();
        $categories = KategoriParfum::all(); // Fetch categories for the form
        return view('admin.barangs', compact('parfums', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_parfum' => 'required|string|max:100',
            'id_kategori_parfum' => 'required|exists:kategori_parfums,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'img' => 'nullable|image|max:2048',
        ]);

        $parfum = new Parfum();
        $parfum->nama_parfum = $request->nama_parfum;
        $parfum->id_kategori_parfum = $request->id_kategori_parfum;
        $parfum->harga = $request->harga;
        $parfum->deskripsi = $request->deskripsi;

        if ($request->hasFile('img')) {
            $parfum->img = file_get_contents($request->file('img'));
        }

        $parfum->save();

        return redirect()->route('admin.barangs')->with('success', 'Parfum added successfully.');
    }

    public function edit($id)
    {
        $parfum = Parfum::findOrFail($id);
        $categories = KategoriParfum::all();
        return view('admin.edit_barang', compact('parfum', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_parfum' => 'required|string|max:100',
            'id_kategori_parfum' => 'required|exists:kategori_parfums,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'img' => 'nullable|image|max:2048',
        ]);

        $parfum = Parfum::findOrFail($id);
        $parfum->nama_parfum = $request->nama_parfum;
        $parfum->id_kategori_parfum = $request->id_kategori_parfum;
        $parfum->harga = $request->harga;
        $parfum->deskripsi = $request->deskripsi;

        if ($request->hasFile('img')) {
            $parfum->img = file_get_contents($request->file('img'));
        }

        $parfum->save();

        return redirect()->route('admin.barangs')->with('success', 'Parfum updated successfully.');
    }

    public function destroy($id)
    {
        $parfum = Parfum::findOrFail($id);
        $parfum->delete();

        return redirect()->route('admin.barangs')->with('success', 'Parfum deleted successfully.');
    }

}
