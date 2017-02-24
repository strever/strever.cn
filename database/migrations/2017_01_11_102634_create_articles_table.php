<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug')->unique();
            $table->string('author');
            $table->unsignedTinyInteger('article_type')->default(1);  // 1-原创；2-转载； 3-改编；
            $table->tinyInteger('category_id')->default(0);
            $table->text('markdown_content');
            $table->text('raw_content');
            $table->boolean('comment_enabled')->default(false);
            $table->boolean('is_publish')->default(false);
            $table->string('tags')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();

            $table->index(['title']);
            $table->index(['published_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
