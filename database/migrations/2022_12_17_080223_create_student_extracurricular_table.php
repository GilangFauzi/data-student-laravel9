<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_extracurricular', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            // onDelete restrict agar value yang terhubung di dalam table class gabisa di apus.
            // todo pake casced biar data relasi student_extracurricular bisa di delete
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            // todo pake cascade biar data mhs yang terhubung dari table student_extracurricular bisa di hapus
            $table->unsignedBigInteger('extracurricular_id');
            $table->foreign('extracurricular_id')->references('id')->on('extracurriculars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_extracurricular');
    }
};