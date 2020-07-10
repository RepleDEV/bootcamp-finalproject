<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->date('created_at');
            $table->date('updated_at');
            $table->bigInteger('points')->default(0);
            $table->boolean('is_best_answer')->default(false);
            $table->bigInteger('question_id');
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
        Schema::dropIfExists('answers');
    }
}
