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
        Schema::create('tbl_checks_bc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';

            $table->increments('ID');
            $table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->nullable();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
            $table->integer('hei_program_ID')->unsigned();
            $table->foreign('hei_program_ID')->references('ID')->on('program_with_code');
            $table->integer('hei_major_ID')->unsigned();
            $table->foreign('hei_major_ID')->references('ID')->on('program_with_code');
            $table->integer('hei_program_code_ID')->unsigned();
            $table->foreign('hei_program_code_ID')->references('ID')->on('program_with_code');
            $table->integer('hei_major_code_ID')->unsigned();
            $table->foreign('hei_major_code_ID')->references('ID')->on('program_with_code');
            $table->tinyInteger('thesis_dissertation')->default(0)->comment('0=NULL, 1=Yes, with thesis/dissertation, 2=No, without thesis/dissertation');
            $table->string('program_status_code');
            $table->string('year_implement')->nullable();
            $table->integer('atop_ID');
            $table->foreign('atop_ID')->references('ID')->on('gpr_level');
            $table->integer('atop_serial_ID');
            $table->foreign('atop_serial_ID')->references('ID')->on('gpr_level');
            $table->integer('atop_year_ID');
            $table->foreign('atop_year_ID')->references('ID')->on('gpr_level');
            $table->text('remarks')->nullable();
            $table->string('program_mode');
            $table->string('program_mode_ot')->nullable();
            $table->double('normal_length');
            $table->double('program_credit');
            $table->double('tuition_per_unit');
            $table->double('program_fee');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_checks_bc');
    }
};
