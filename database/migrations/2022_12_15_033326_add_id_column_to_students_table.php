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
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->required()->after('id');
            // onDelete restrict agar value yang terhubung di dalam table class gabisa di apus
            $table->foreign('class_id')->references('id')->on('class')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // kalau mau rollback hapus forgein key nya dulu
            $table->dropForeign(['class_id']);
            $table->dropColumn('class_id');
        });
    }
};