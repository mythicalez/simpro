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
        Schema::create('partlist_out', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('part_master_id');
            $table->integer('qty')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status')->nullable()->default('aktif');

            $table->foreign('part_master_id')->references('id')->on('part_master')->onDelete('cascade');
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
        Schema::dropIfExists('partlist_out');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
