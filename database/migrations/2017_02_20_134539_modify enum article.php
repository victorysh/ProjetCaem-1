<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyEnumArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('articles', function (Blueprint $table) {
    $table->dropcolumn('status');


    });
     Schema::table('articles', function (Blueprint $table) {
   
    $table->enum('status', ['EN LIGNE', 'HORS LIGNE'])->default('EN LIGNE');

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
    Schema::table('articles', function (Blueprint $table) {
        $table->dropcolumn('status');


    });
    }   
}