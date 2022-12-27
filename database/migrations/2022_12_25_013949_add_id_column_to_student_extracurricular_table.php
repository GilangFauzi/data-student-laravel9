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
        Schema::table('student_extracurricular', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->first();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_extracurricular', function (Blueprint $table) {
            $table->dropColumn('id');
            // $table->dropPrimary('student_extracurricular_id_primary');
            $table->dropForeign(['id']);
        });
    }
};