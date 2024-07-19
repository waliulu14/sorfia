<?php
// database/migrations/xxxx_xx_xx_create_kategori_parfums_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriParfumsTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_parfums', function (Blueprint $table) {
            $table->id();
            $table->string('kategori', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_parfums');
    }
}
