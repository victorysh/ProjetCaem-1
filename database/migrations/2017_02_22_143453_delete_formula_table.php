<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFormulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('formula_activities', function($table)
            {

                $table->dropForeign('formula_activities_ibfk_1');
                $table->dropForeign('formula_activities_ibfk_2');


            });



        Schema::dropIfExists('formulas');
        Schema::dropIfExists('formula_activities');
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
