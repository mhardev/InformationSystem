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
        Schema::create('program_with_code', function (Blueprint $table) {
            $table->increments('ID'); // Auto-incrementing ID
            $table->string('CODE', 100)->nullable(); // CODE column, varchar(100), nullable
            $table->string('Program', 100)->nullable(); // Program column, varchar(100), nullable
            $table->string('Major', 100)->nullable(); // Major column, varchar(100), nullable
            $table->integer('control_no')->default(1); // control_no column, int, default 1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_with_code');
    }
};
