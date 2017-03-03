<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropcolumn('picture_1');
            $table->dropcolumn('picture_2');
            $table->dropcolumn('age_min');
            $table->dropcolumn('age_max');
            $table->dropcolumn('when');
            $table->dropcolumn('price');
            $table->time('hour_start')->nullable()->change();
            $table->time('hour_end')->nullable()->change();
            $table->string('day')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('name')->nullable()->change();
         });

        Schema::table('activities_web', function (Blueprint $table) {
            $table->string('picture_1')->nullable()->change();
            $table->string('picture_2')->nullable()->change();
            $table->integer('age_min')->nullable()->change();
            $table->integer('age_max')->nullable()->change();
            $table->string('when')->nullable()->change();
            $table->string('price')->nullable()->change();
            $table->time('hour_start')->nullable()->change();
            $table->time('hour_end')->nullable()->change();
            $table->string('day')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('name')->nullable()->change();
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
    }
}
