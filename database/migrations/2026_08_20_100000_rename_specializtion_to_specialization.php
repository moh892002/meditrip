<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('specialists', 'specializtion_id')) {
            Schema::table('specialists', function (Blueprint $table) {
                $table->renameColumn('specializtion_id', 'specialization_id');
            });
        }
        if (Schema::hasColumn('orders', 'specializtion_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->renameColumn('specializtion_id', 'specialization_id');
            });
        }
        if (Schema::hasTable('specializtions') && !Schema::hasTable('specializations')) {
            Schema::rename('specializtions', 'specializations');
        }
        if (Schema::hasTable('hospital_specializtion') && !Schema::hasTable('hospital_specialization')) {
            Schema::rename('hospital_specializtion', 'hospital_specialization');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('hospital_specialization') && !Schema::hasTable('hospital_specializtion')) {
            Schema::rename('hospital_specialization', 'hospital_specializtion');
        }
        if (Schema::hasTable('specializations') && !Schema::hasTable('specializtions')) {
            Schema::rename('specializations', 'specializtions');
        }
        if (Schema::hasColumn('orders', 'specialization_id') && !Schema::hasColumn('orders', 'specializtion_id')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->renameColumn('specialization_id', 'specializtion_id');
            });
        }
        if (Schema::hasColumn('specialists', 'specialization_id') && !Schema::hasColumn('specialists', 'specializtion_id')) {
            Schema::table('specialists', function (Blueprint $table) {
                $table->renameColumn('specialization_id', 'specializtion_id');
            });
        }
    }
};
