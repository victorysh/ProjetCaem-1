<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIdProduit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

                Schema::table('produits', function (Blueprint $table) {


                        # code...
                    if (Schema::hasColumn('produits', 'activities_id'))
                        {
                            $table->renameColumn('activities_id','activity_id');
                        }


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
        Schema::table('produits', function (Blueprint $table) {


                        # code...
                    if (Schema::hasColumn('produits', 'activity_id'))
                        {
                            $table->renameColumn('activity_id','activities_id');
                        }


                });
    }
}
