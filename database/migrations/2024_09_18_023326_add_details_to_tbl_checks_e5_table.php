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
            $table->tinyInteger('member_type')->default(0)->comment('0=None, 1=Faculty, 2=Not Faculty');
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
