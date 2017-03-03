<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonTypePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          // Schema::create('people_type_people', function($table) {
          //       $table->increments('id');
          //       $table->integer('person_id')->unsigned();
          //       $table->foreign('person_id')->references('id')->on('people');
          //       $table->integer('type_person_id')->unsigned();
          //       $table->foreign('type_person_id')->references('id')->on('type_people');
          //       $table->timestamps();
          //       $table->softDeletes();
          //   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //Schema::drop('people_type_people');

    }
}
