<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStatusBoolean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('status');
            
         });

        Schema::table('activity_webs', function (Blueprint $table) {
            $table->dropColumn('status');
         
         });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('status');
            
         });

        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('status');
          
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
