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
        Schema::create('tbl_subject_taught', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('CODE');
            $table->string('Description');
            $table->integer('No_fields');$table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->nullable();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
            $table->string('status');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_subject_taught');
    }
};
