<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surename', 50);
            $table->string('insertion')->nullable();
            $table->string('firstname', 60);
            $table->string('email');
            $table->string('phonenumber')->nullable();
            $table->unsignedInteger('education_offer_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('school_id')->nullable();

            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
