<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('begin');
            $table->date('end')->nullable();
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedInteger('education_offer_id')->nullable();
            $table->foreign('education_offer_id')->references('id')->on('education_offers')->onDelete('cascade');
            $table->unsignedInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
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
        Schema::drop('internships');
    }
}
