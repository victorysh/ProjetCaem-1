<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPersonId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasColumn('type_people', 'person_id'))
        {
            Schema::table('type_people', function (Blueprint $table) {
                // $table->dropIndex('ID_personne');
                $table->dropForeign('type_people_ibfk_1');
                $table->dropColumn('person_id');
            });
            //
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

        // Schema::table('type_people', function (Blueprint $table) {
        //     $table->number('person_id',11);
        // });
    }
}
