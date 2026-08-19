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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('rate');
            $table->string('city');
            $table->string('country');
            $table->string('image');
            $table->string('about');
            $table->json('services');
            $table->string('facilities'); //المرافق
            $table->integer('beds_num'); // عدد الاسرَة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
