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
            // DB::statement('UPDATE staff SET role_id = NULL WHERE role_id NOT IN (SELECT id FROM roles)');

            // Add the column if it doesn't exist already
            if (!Schema::hasColumn('staff', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable()->after('email');
            }

            // Add the foreign key constraint
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
};
