<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshiptoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('internshiptools', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('internship_user_id')->nullable();;
            $table->unsignedInteger('company_id')->nullable();;
            $table->unsignedInteger('tool_id')->nullable();;
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('internship_user_id')->references('id')->on('internship_users');
            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');

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
        Schema::drop('internshiptools');
    }
}
