<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create( 'blog_article_blog_article_category', function ( Blueprint $table ) {
            $table->id();
            $table->foreignIdFor( \App\Models\BlogArticle::class );
            $table->foreignIdFor( \App\Models\BlogArticleCategory::class );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists( 'blog_article_blog_article_category' );
    }
};
