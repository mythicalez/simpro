<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom foreign key untuk relasi dengan tabel "bagian"
            $table->unsignedBigInteger('bagian_id')->after('id');
            $table->foreign('bagian_id')->references('id')->on('bagian');

            // Menambah kolom untuk menyimpan peran (role)
            $table->enum('role', ['administrator', 'karyawan', 'guest'])->default('karyawan')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan pada saat migrasi di-rollback
            $table->dropForeign(['bagian_id']);
            $table->dropColumn(['bagian_id', 'role']);
        });
    }
};
