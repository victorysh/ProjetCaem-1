<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodeAnalytiqueGender extends Migration
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
            //$table->dropcolumn('image_right');
            $table->text('code_analytique');
            $table->tinyInteger('gender')->nullable();
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
        Schema::table('people', function (Blueprint $table) {
            //$table->dropcolumn('image_right');
            $table->dropcolumn('code_analytique');
            $table->dropcolumn('gender');
        });
    }
}
