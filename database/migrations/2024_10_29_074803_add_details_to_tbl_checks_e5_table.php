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
            $table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->nullable();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
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
