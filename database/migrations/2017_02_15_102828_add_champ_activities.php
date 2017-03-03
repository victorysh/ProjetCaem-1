<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChampActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('activities', function (Blueprint $table) {

            $table->text('description');
            $table->string('picture_1');
            $table->string('picture_2');
            $table->integer('age_min');
            $table->integer('age_max');
            $table->string('day');
            $table->time('hour_start');
            $table->time('hour_end');
            $table->boolean('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::table('activities', function (Blueprint $table) {

            $table->dropcolumn('description');
            $table->dropcolumn('picture_1');
            $table->dropcolumn('picture_2');
            $table->dropcolumn('age_min');
            $table->dropcolumn('age_max');
            $table->dropcolumn('day');
            $table->dropcolumn('hour_start');
            $table->dropcolumn('hour_end');
            $table->dropcolumn('status');

        });
    }
}
