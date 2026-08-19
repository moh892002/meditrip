<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('hospital_id')->nullable()->constrained()->cascadeOnDelete();
            $table->decimal('rating', 3, 1)->default(0);
            $table->text('review')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['hospital_id']);
            $table->dropColumn(['user_id', 'hospital_id', 'rating', 'review']);
        });
    }
};
