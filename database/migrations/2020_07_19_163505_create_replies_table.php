<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('thread_id')->unsigned();
            $table->text('description');
            $table->string('hash');
            $table->timestamps();

            // $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
            // $table->foreign('user_id')->references('id)')->on('users')->onDelete('cascade');
        });

        Schema::table('replies', function ($table) {
            $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
