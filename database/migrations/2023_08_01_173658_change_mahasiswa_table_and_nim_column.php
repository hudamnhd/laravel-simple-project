<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah nama kolom 'nim' menjadi 'nis'
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->renameColumn('nim', 'nis');
        });

        // Ubah nama tabel 'mahasiswa' menjadi 'siswa'
        Schema::rename('mahasiswa', 'siswa');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ubah kembali nama tabel 'siswa' menjadi 'mahasiswa'
        Schema::rename('siswa', 'mahasiswa');

        // Ubah kembali nama kolom 'nis' menjadi 'nim'
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->renameColumn('nis', 'nim');
        });
    }
};
