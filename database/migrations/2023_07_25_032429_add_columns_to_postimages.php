<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPostimages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postimages', function (Blueprint $table) {
            // Tambahkan kolom 'overview' tipe teks
            $table->text('overview')->nullable();

            // Tambahkan kolom 'priceTextValue' tipe integer
            $table->integer('priceTextValue')->nullable();

            // Tambahkan kolom 'selectBudget' tipe string
            $table->string('selectBudget')->nullable();

            // Tambahkan kolom 'category' tipe JSON
            $table->json('category')->nullable();
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
            // Hapus kolom jika migrasi di-rollback
            $table->dropColumn('overview');
            $table->dropColumn('priceTextValue');
            $table->dropColumn('selectBudget');
            $table->dropColumn('category');
        });
    }
}
