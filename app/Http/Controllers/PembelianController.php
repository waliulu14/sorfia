<?php
// app/Http/Controllers/PembelianController.php

// app/Http/Controllers/PembelianController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Parfum;

class PembelianController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'parfum_id' => 'required|exists:parfums,id',
            'quantity' => 'required|integer|min:1',
            'buyer_name' => 'required|string|max:255',
            'buyer_address' => 'required|string|max:255',
            'buyer_phone' => 'required|string|max:15',
        ]);

        $parfum = Parfum::find($validated['parfum_id']);
        $total_price = $parfum->harga * $validated['quantity'];

        Pembelian::create([
            'parfum_id' => $validated['parfum_id'],
            'nama_pembeli' => $validated['buyer_name'],
            'alamat' => $validated['buyer_address'],
            'nomor_telepon' => $validated['buyer_phone'],
            'jumlah' => $validated['quantity'],
            'total_harga' => $total_price,
        ]);

        return response()->json(['success' => true, 'message' => 'Pembelian berhasil dilakukan.']);
    }
}

