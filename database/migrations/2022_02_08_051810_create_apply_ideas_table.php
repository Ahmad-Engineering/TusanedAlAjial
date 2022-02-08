<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_ideas', function (Blueprint $table) {
            $table->id();
            $table->string('idea_name', 50);
            $table->string('full_name', 50);
            $table->string('phone', 30);
            $table->string('pin', 30);

            // STAFF IDEA
            $table->foreignId('staff_id')->nullable();
            $table->foreign('staff_id')->on('staff')->references('id');
            // END STAFF IDEA

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
        Schema::dropIfExists('apply_ideas');
    }
}
