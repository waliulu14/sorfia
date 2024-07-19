<?php

// app/Models/Parfum.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parfum extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori_parfum', 'nama_parfum', 'harga', 'deskripsi', 'img'];

    public function kategori()
    {
        return $this->belongsTo(KategoriParfum::class, 'id_kategori_parfum');
    }
}
