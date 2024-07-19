<?php

// app/Models/KategoriParfum.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriParfum extends Model
{
    use HasFactory;

    protected $fillable = ['kategori'];

    public function parfums()
    {
        return $this->hasMany(Parfum::class, 'id_kategori_parfum');
    }
}
