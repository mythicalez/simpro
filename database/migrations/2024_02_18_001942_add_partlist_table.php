<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subproject_id');
            $table->unsignedBigInteger('user_id');

            $table->string('nama_file')->nullable();
            $table->string('catatan')->nullable();
            $table->string('tanggal')->nullable();
            $table->enum('jenis', ['import', 'manual'])->default('import');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subproject_id')->references('id')->on('subprojects')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('partlist');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
