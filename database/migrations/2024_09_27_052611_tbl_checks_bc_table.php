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
        Schema::create('tbl_checks_bc', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';

            $table->increments('ID');
            $table->integer('hei_program_ID')->unsigned();
            $table->foreign('hei_program_ID')->references('ID')->on('hei');
            $table->integer('hei_major_ID')->unsigned();
            $table->foreign('hei_major_ID')->references('ID')->on('hei');
            $table->integer('hei_program_code_ID')->unsigned();
            $table->foreign('hei_program_code_ID')->references('ID')->on('hei');
            $table->integer('hei_major_code_ID')->unsigned();
            $table->foreign('hei_major_code_ID')->references('ID')->on('hei');
            $table->tinyInteger('thesis_dissertation')->default(0)->comment('0=NULL, 1=Yes, with thesis/dissertation, 2=No, without thesis/dissertation');
            $table->string('program_status_code');
            $table->string('year_implement');
            $table->integer('atop_ID')->unsigned();
            $table->foreign('atop_ID')->references('ID')->on('gpr_level');
            $table->integer('atop_serial_ID')->unsigned();
            $table->foreign('atop_serial_ID')->references('ID')->on('gpr_level');
            $table->integer('atop_year_ID')->unsigned();
            $table->foreign('atop_year_ID')->references('ID')->on('gpr_level');
            $table->text('remarks');
            $table->string('program_mode');
            $table->string('program_mode');
            $table->string('normal_length');
            $table->string('program_credit');
            $table->double('tuition_per_unit');
            $table->string('program_fee');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
