<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_checks_e5', function (Blueprint $table) { // Match this with 'tbl_program'
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';

            $table->increments('ID');
            $table->integer('user_ID')->unsigned()->nullable();
            $table->foreign('user_ID')->references('ID')->on('users');
            $table->integer('Hei_ID')->unsigned()->nullable();
            $table->foreign('Hei_ID')->references('ID')->on('hei');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial');
            $table->integer('ftpt_ID')->unsigned();
            $table->foreign('ftpt_ID')->references('ID')->on('tbl_checks_e5_ftpt');
            $table->tinyInteger('gender')->default(0)->comment('0=NULL, 1=Male, 2=Female');
            $table->integer('hda_ID')->unsigned();
            $table->foreign('hda_ID')->references('ID')->on('tbl_checks_e5_hda');
            $table->integer('programcode_ID_1')->unsigned();
            $table->foreign('programcode_ID_1')->references('ID')->on('tbl_program');
            $table->integer('programcode_ID_2')->unsigned();
            $table->foreign('programcode_ID_2')->references('ID')->on('tbl_program');
            $table->integer('programcode_ID_3')->unsigned();
            $table->foreign('programcode_ID_3')->references('ID')->on('tbl_program');
            $table->integer('programcode_ID_4')->unsigned();
            $table->foreign('programcode_ID_4')->references('ID')->on('tbl_program');
            $table->integer('pl_ID')->unsigned();
            $table->foreign('pl_ID')->references('ID')->on('tbl_checks_e5_prof_license');
            $table->tinyInteger('tenure')->default(0)->comment('0=NULL, 1=Permanent, 2=Probationary, 3=Casual, 4=Contractual');
            $table->integer('fr_ID')->unsigned();
            $table->foreign('fr_ID')->references('ID')->on('tbl_checks_e5_faculty_rank');
            $table->integer('tl_ID')->unsigned();
            $table->foreign('tl_ID')->references('ID')->on('tbl_checks_e5_teaching_load');
            $table->text('subject_taught');
            $table->integer('as_ID')->unsigned();
            $table->foreign('as_ID')->references('ID')->on('tbl_checks_e5_annual_salary');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_checks_e5');
    }
};
