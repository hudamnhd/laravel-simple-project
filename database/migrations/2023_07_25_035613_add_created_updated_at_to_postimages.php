<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedUpdatedAtToPostimages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postimages', function (Blueprint $table) {
            // Tambahkan kolom 'created_at' jika belum ada
            if (!Schema::hasColumn('postimages', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }

            // Tambahkan kolom 'updated_at' jika belum ada
            if (!Schema::hasColumn('postimages', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postimages', function (Blueprint $table) {
            // Hapus kolom 'created_at' jika migrasi di-rollback
            $table->dropColumn('created_at');

            // Hapus kolom 'updated_at' jika migrasi di-rollback
            $table->dropColumn('updated_at');
        });
    }
}
