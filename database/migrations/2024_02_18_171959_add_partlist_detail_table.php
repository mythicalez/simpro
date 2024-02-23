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
        Schema::create('partlist_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partlist_id');
            $table->unsignedBigInteger('part_master_id');

            $table->string('kd_mark')->nullable();
            $table->string('profile')->nullable();
            $table->string('grade')->nullable();
            $table->integer('qty')->nullable();
            $table->double('length')->nullable();
            $table->double('area')->nullable();
            $table->double('weight')->nullable();
            $table->string('status')->nullable()->default('aktif');


            $table->foreign('partlist_id')->references('id')->on('partlist')->onDelete('cascade');
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
        Schema::dropIfExists('partlist_detail');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
