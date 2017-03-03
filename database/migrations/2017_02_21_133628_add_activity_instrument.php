<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityInstrument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('activity_instruments')){
            Schema::table('activity_instruments', function($table)
            {

                $table->integer('instrument_id')->unsigned()->change();
                $table->index('instrument_id')->references('id')->on('instruments')->change();
                $table->integer('activity_id')->unsigned()->change();
                $table->index('activity_id')->references('id')->on('activities')->change();

            });
        }else{

            Schema::create('activity_instruments', function($table)
            {

                $table->integer('instrument_id')->unsigned();
                $table->foreign('instrument_id')->references('id')->on('instruments');
                $table->integer('activity_id')->unsigned();
                $table->foreign('activity_id')->references('id')->on('activities');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('activity_instruments');
    }
}
