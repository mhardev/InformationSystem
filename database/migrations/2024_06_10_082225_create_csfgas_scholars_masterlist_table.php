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
        Schema::create('csfgas_scholars_masterlist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ay_grant', length: 100);
            $table->integer('region');
            $table->integer('sp_id');
            $table->string('award_no', length: 100);
            $table->string('lastname', length: 100);
            $table->string('firstname', length: 100);
            $table->string('middlename', length: 100)->nullable();
            $table->string('suffix', length: 100)->nullable();
            $table->string('fullname', length: 100);
            $table->date('bday');
            $table->string('gender', length: 25);
            $table->string('contactno', length: 100)->nullable();
            $table->string('email', length: 100)->nullable();
            $table->text('address');
            $table->string('city', length: 100);
            $table->string('province', length: 100)->nullable();
            $table->integer('heis_id');
            $table->integer('hei_program_id');
            $table->integer('yearlevel');
            $table->string('bank', length: 100)->nullable();
            $table->string('branch', length: 100)->nullable();
            $table->string('atm', length: 100)->nullable();
            $table->string('status', length: 100);
            $table->string('sub_status', length: 100);
            $table->text('remarks');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csfgas_scholars_masterlist');
    }
};
