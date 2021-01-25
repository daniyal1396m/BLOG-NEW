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
            $table->integer('cat_id',null);
            $table->integer('sub_cat_id',null);
            $table->string('title', 100);
            $table->string('body', 255);
            $table->string('pic', 255);
//            $table->string('video', 255)->nullable();
            $table->boolean('status');
            $table->string('slug');
            $table->integer('countViews',null);
            $table->integer('countComments',null);
            $table->timestamps();
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
