<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveColumnPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('people', function (Blueprint $table) {
            $table->dropcolumn('name');
            $table->dropcolumn('family_name');
            $table->dropcolumn('gender');
            $table->dropcolumn('tel_mob');
            $table->dropcolumn('tel_fix');
         });

         Schema::table('people', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            $table->string('family_name')->after('name')->nullable();
            $table->string('gender')->after('family_name')->nullable();
            $table->string('tel_mob')->after('gender')->nullable();
            $table->string('tel_fix')->after('tel_mob')->nullable();
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
