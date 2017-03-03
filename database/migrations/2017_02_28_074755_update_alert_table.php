<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::table('alerts', function (Blueprint $table) {


            $table->dropColumn('picture');
            $table->text('message')->nullable();

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
        Schema::table('alerts', function (Blueprint $table) {


            $table->string('picture')->nullable();
            $table->dropColumn('message');

        });
    }
}
