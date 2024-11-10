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
        Schema::create('tbl_hei_program', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->unsigned();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
            $table->integer('Program_ID')->unsigned()->nullable();
            $table->foreign('Program_ID')->references('ID')->on('tbl_program');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_hei_program');
    }
};
