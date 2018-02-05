<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->enum('post_type', array('stage', 'formation'));
            $table->string('title', 100);
            $table->text('description');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
             // autorise au maximum 6 chiffres dont 2 sont situés après la virgule
            $table->decimal('price', 6, 2);
            $table->unsignedInteger('students_max');
            $table->enum('status', array('published', 'unpublished'))->default('unpublished');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('posts');
    }
}
