<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagesToPostimagesTable extends Migration
{
    public function up()
    {
        Schema::table('postimages', function (Blueprint $table) {
            $table->json('images')->nullable(); // Menambahkan kolom 'images' dengan tipe data JSON
        });
    }

    public function down()
    {
        Schema::table('postimages', function (Blueprint $table) {
            $table->dropColumn('images'); // Rollback: menghapus kolom 'images' dari tabel
        });
    }
}
