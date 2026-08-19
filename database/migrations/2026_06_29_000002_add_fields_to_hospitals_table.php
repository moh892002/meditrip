<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->integer('founded_year')->nullable()->after('beds_num');
            $table->integer('doctors_count')->nullable()->after('founded_year');
            $table->integer('staff_count')->nullable()->after('doctors_count');
            $table->integer('operations_count')->nullable()->after('staff_count');
            $table->string('logo')->nullable()->after('image');
            $table->json('images')->nullable()->after('logo');
        });
    }

    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn(['founded_year', 'doctors_count', 'staff_count', 'operations_count', 'logo', 'images']);
        });
    }
};
