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
        Schema::create('tbl_checks_list_of_graduates', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';

            $table->increments('ID');
            $table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->unsigned()->nullable();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
            $table->string('AY', length: 100)->nullable();
            $table->string('Student_ID', length: 100)->nullable();
            $table->string('Date_of_birth', length: 100)->nullable();
            $table->string('Last_name');
            $table->string('First_name');
            $table->string('Middle_name');
            $table->string('Sex', length: 100)->nullable();
            $table->string('Date_graduated', length: 100)->nullable();
            $table->integer('GPR_ID')->nullable();
            $table->foreign('GPR_ID')->references('ID')->on('gpr_level');
            $table->string('Major', length: 100)->nullable();
            $table->string('Authority_number', length: 100)->nullable();
            $table->string('Year_granted', length: 100)->nullable();
            $table->text('Remarks')->nullable();
            $table->string('status');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_checks_list_of_graduates');
    }
};
