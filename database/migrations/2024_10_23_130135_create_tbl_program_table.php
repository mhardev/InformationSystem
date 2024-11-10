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
        Schema::create('tbl_program', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('PSCED_ID')->unsigned()->nullable();
            $table->foreign('PSCED_ID')->references('ID')->on('tbl_psced');
            $table->string('Level');
            $table->string('Program');
            $table->string('between_type');
            $table->string('Major');
            $table->integer(column: 'Cluster_ID')->nullable();
            $table->foreign('Cluster_ID')->references('ID')->on('program_cluster');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_program');
    }
};
