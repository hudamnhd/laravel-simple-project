<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('users')->where('role', 'guru')->update(['role' => 'admin']);
        DB::table('users')->where('role', 'siswa')->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('role', 'admin')->update(['role' => 'guru']);
        DB::table('users')->where('role', 'user')->update(['role' => 'siswa']);
    }
};
