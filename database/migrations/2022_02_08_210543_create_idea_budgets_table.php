<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeaBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_budgets', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20);
            $table->string('unit', 20);
            $table->double('amount')->unsigned();
            $table->double('price')->unsigned();
            $table->integer('salary_shikel')->unsigned();
            $table->integer('price_salary_shikel')->unsigned();
            $table->foreignId('idea_id');
            $table->foreign('idea_id')->on('apply_ideas')->references('id');
            $table->string('notes', 200)->nullable();
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
        Schema::dropIfExists('idea_budgets');
    }
}
