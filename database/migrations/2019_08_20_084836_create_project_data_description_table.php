<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDataDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_data_description', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('typeOfData');
            $table->string('description');
            $table->string('typeOfAnalysis');
            $table->string('when');
            $table->string('where');
            $table->string('link');
            $table->string('typeOfFile');
            $table->bigInteger('title_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('title_id')->references('id')->on('project_info')->onDelete('cascade');
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
        Schema::dropIfExists('project_data_description');
    }
}
