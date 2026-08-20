<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('DELETE FROM rates WHERE id NOT IN (SELECT MIN(id) FROM rates GROUP BY user_id, hospital_id)');

        Schema::table('rates', function (Blueprint $table) {
            $table->unique(['user_id', 'hospital_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'hospital_id']);
        });
    }
};
