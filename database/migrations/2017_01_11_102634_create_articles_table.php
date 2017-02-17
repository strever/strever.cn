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
            $table->string('slug')->unique();
            $table->string('sub_title');
            $table->unsignedTinyInteger('article_type')->default(1);  // 1-原创；2-转载； 3-改编；
            $table->tinyInteger('cate_id')->default(0);
            $table->text('content');
            $table->integer('comment_count')->default(0);
            $table->integer('visited_count')->default(0);
            $table->boolean('comment_enabled')->default(false);
            $table->boolean('is_show')->default(false);
            $table->string('tags')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();

            $table->index(['title']);
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
