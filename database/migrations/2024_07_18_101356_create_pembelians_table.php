<?php

// database/migrations/xxxx_xx_xx_create_pembelians_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parfum_id')->constrained('parfums');
            $table->string('nama_pembeli', 100);
            $table->string('alamat', 255);
            $table->string('nomor_telepon', 20);
            $table->integer('jumlah');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}

