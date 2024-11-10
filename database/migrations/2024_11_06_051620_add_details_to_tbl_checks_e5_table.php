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
        Schema::table('tbl_checks_e5', function (Blueprint $table) {
            $table->integer('programID_1')->unsigned()->nullable();
            $table->foreign('programID_1')->references('ID')->on('tbl_program');
            $table->integer('programID_2')->unsigned()->nullable();
            $table->foreign('programID_2')->references('ID')->on('tbl_program');
            $table->integer('programID_3')->unsigned()->nullable();
            $table->foreign('programID_3')->references('ID')->on('tbl_program');
            $table->integer('programID_4')->unsigned()->nullable();
            $table->foreign('programID_4')->references('ID')->on('tbl_program');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_checks_e5', function (Blueprint $table) {
            //
        });
    }
};
