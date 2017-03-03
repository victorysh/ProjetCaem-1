<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveColumnActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('activities', function($table)
            {

                $table->dropcolumn('year');
                $table->dropcolumn('status');


            });
          Schema::table('activities', function($table)
            {

                $table->integer('year')->nullable();
               $table->string('status')->default('EN LIGNE');


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

          Schema::table('activities', function($table)
            {

                $table->string('status')->default('EN LIGNE')->change();
                $table->integer('year')->nullable()->change();


            });


    }
}
