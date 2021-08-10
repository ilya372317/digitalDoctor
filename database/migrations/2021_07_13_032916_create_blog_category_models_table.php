<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category_models', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->bigInteger('parent_id');
            $table->softDeletes()->nullable();
            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_category_models');
    }
}
