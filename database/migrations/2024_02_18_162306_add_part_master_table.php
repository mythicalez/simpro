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
        Schema::create('part_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subproject_id');
            $table->string('kd_mark')->nullable();
            $table->string('mark')->nullable();
            $table->string('profile')->nullable();
            $table->string('grade')->nullable();
            $table->integer('qty')->nullable();
            $table->double('length')->nullable();
            $table->double('area')->nullable();
            $table->double('weight')->nullable();
            $table->string('status')->nullable()->default('aktif');
            $table->integer('version')->unsigned()->nullable()->default(0);

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
        Schema::dropIfExists('part_master');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
