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
        Schema::table('volunteers,supervisors', function (Blueprint $table) {
            $table->string('role')->default('volunteer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteers,supervisors', function (Blueprint $table) {
            $table->string('role')->default('admin');
        });
    }
};
