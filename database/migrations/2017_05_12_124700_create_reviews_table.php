<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('review');
            $table->integer('mark');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedInteger('internship_user_id');
            $table->foreign('internship_user_id')->references('id')->on('internship_users');
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
        Schema::drop('reviews');
    }
}
