<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoneToApplyIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_ideas', function (Blueprint $table) {
            //
            $table->tinyInteger('done')->default(0)->after('pin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_ideas', function (Blueprint $table) {
            //
            $table->tinyInteger('done')->default(0)->after('pin');
        });
    }
}
