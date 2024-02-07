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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->json('countries')->nullable();
            $table->integer('order')->nullable();
            $table->string('academic_degree')->nullable();
            $table->string('name');
            $table->string('postgraduate')->nullable();
            $table->json('position')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->json('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
