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
        Schema::table('tbl_checks_list_of_graduates', function (Blueprint $table) {
            $table->integer(column: 'Program_ID')->unsigned()->nullable();
            $table->foreign('Program_ID')->references('ID')->on('tbl_program');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_checks_list_of_graduates', function (Blueprint $table) {
            //
        });
    }
};
