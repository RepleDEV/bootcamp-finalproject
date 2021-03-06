<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('content', 255);
            $table->string('tags', 255);
            $table->date('created_at', 255);
            $table->date('updated_at', 255);
            $table->bigInteger('points')->default(0);
            $table->string('user_created');
            $table->string('upvoted', 255)->default("");
            $table->string('downvoted', 255)->default("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
