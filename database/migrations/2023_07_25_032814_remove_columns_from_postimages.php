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
        Schema::table('postimages', function (Blueprint $table) {
            // // Hapus kolom image
            $table->dropColumn('image');

            // Hapus kolom created_at dan updated_at
            $table->dropTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postimages', function (Blueprint $table) {
            $table->string('image');

            $table->timestamps();
        });
    }
};
