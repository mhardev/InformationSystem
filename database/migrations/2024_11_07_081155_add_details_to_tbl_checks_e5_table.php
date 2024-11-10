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
            $table->integer('subject_ID')->unsigned()->nullable();
            $table->foreign('subject_ID')->references('ID')->on('tbl_subject_taught');
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
