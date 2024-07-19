<?php

// app/Models/Pembelian.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'parfum_id',
        'nama_pembeli',
        'alamat',
        'nomor_telepon',
        'jumlah',
        'total_harga',
    ];

    public function parfum()
    {
        return $this->belongsTo(Parfum::class, 'parfum_id');
    }
}
