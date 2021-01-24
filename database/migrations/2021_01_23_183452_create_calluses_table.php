<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calluses', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('lastname',50);
            $table->string('email',100);
            $table->integer('phone',null);
            $table->string('title',50);
            $table->string('body',50);
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
        Schema::dropIfExists('calluses');
    }
}
