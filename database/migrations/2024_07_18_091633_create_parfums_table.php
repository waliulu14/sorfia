<?php
// database/migrations/xxxx_xx_xx_create_parfums_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParfumsTable extends Migration
{
    public function up()
    {
        Schema::create('parfums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_parfum')->constrained('kategori_parfums');
            $table->string('nama_parfum', 100);
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->binary('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parfums');
    }
}
