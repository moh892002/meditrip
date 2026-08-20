<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('specialists', function (Blueprint $table) {
            $table->foreignId('hospital_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('specialization_id')->nullable()->constrained('specializations')->nullOnDelete();
            $table->decimal('rate', 3, 1)->nullable()->default(0);
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('specialists', function (Blueprint $table) {
            $table->dropForeign(['hospital_id']);
            $table->dropForeign(['specialization_id']);
            $table->dropColumn(['hospital_id', 'specialization_id', 'rate', 'description', 'price']);
        });
    }
};
