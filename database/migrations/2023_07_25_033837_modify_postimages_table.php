<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPostimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postimages', function (Blueprint $table) {
            // Hapus kolom 'created_by' dan 'updated_by' jika ada
            if (Schema::hasColumn('postimages', 'created_by')) {
                $table->dropColumn('created_by');
            }

            if (Schema::hasColumn('postimages', 'updated_by')) {
                $table->dropColumn('updated_by');
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
            // Tambahkan kembali kolom 'created_by' dan 'updated_by' jika migrasi di-rollback
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }
}
