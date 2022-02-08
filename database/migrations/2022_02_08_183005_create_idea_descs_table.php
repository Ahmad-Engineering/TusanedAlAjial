<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaDescsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_descs', function (Blueprint $table) {
            $table->id();
            $table->string('idea_desc', 500);
            $table->string('governorate', 30);
            $table->string('district', 30);
            $table->string('pin', 30);
            $table->string('goal', 400);
            $table->string('importance', 300)->nullable();
            $table->integer('male_no')->unsigned();
            $table->integer('female_no')->unsigned();

            // IDEA ID
            $table->foreignId('idea_id');
            $table->foreign('idea_id')->on('apply_ideas')->references('id');

            $table->string('methodology', 300)->nullable();
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
        Schema::dropIfExists('idea_descs');
    }
}
