<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifActivitiesweb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_webs', function (Blueprint $table) {
            $table->text('when')->change();
            $table->text('price')->change();
            $table->dropcolumn('day');
            $table->dropcolumn('hour_start');
            $table->dropcolumn('hour_end');

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
