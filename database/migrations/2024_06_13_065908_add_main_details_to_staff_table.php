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
        Schema::table('staff', function (Blueprint $table) {
            $table->string('gender')->after('password')->nullable();
            $table->string('dob')->after('gender')->nullable();
            $table->string('bankname')->after('dob')->nullable();
            $table->string('bankbranch')->after('bankname')->nullable();
            $table->string('ifsc')->after('bankbranch')->nullable();
            $table->string('accountnumber')->after('ifsc')->nullable();
           
            $table->string('icard')->after('accountnumber')->nullable();
            $table->string('photo')->after('icard')->nullable();
            $table->string('documents')->after('photo')->nullable();
            $table->string('adhaarcard')->after('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            //
        });
    }
};
