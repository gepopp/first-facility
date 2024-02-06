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
        Schema::create('frontpage_introtext_blocks', function (Blueprint $table) {
            $table->id();
            $table->json('countries');
            $table->json('pre_heading');
            $table->json('heading');
            $table->json('excerpt');
            $table->json('text');
            $table->json('links')->nullable();
            $table->text('embed_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontpage_introtext_blocks');
    }
};
