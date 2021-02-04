<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id',null);
            $table->integer('category',null);
            $table->integer('sub_category',null);
            $table->string('title', 30);
            $table->string('body', 50);
            $table->string('description', 10000);
//            $table->string('name', 255);
            $table->string('image', 255);//path
//            $table->string('video', 255)->nullable();
            $table->string('slug');
            $table->integer('countViews',null)->nullable();
            $table->integer('countComments',null)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
