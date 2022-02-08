<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_outputs', function (Blueprint $table) {
            $table->id();
            $table->string('outputs', 500);

            // IDEA ID
            $table->foreignId('idea_id');
            $table->foreign('idea_id')->on('apply_ideas')->references('id');

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
        Schema::dropIfExists('idea_outputs');
    }
}
