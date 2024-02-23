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
        Schema::create('assembly_list_detail_rev', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assembly_list_detail_id');

            $table->string('profile')->nullable();
            $table->integer('qty')->nullable();
            $table->double('length')->nullable();
            $table->double('area')->nullable();
            $table->double('weight')->nullable();
            $table->string('lokasi_x')->nullable();
            $table->string('lokasi_y')->nullable();
            $table->string('lokasi_elevasi')->nullable();
            $table->string('status')->nullable()->default('aktif');
            
            $table->foreign('assembly_list_detail_id')->references('id')->on('assembly_list_detail')->onDelete('cascade');
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
        Schema::dropIfExists('assembly_list_detail');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
