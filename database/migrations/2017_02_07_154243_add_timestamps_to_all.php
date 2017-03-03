<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        $tables = [
        "activities",

        "famillies",
        "formulae",
        "formula_activities",
        "instruments",
        "locations",
        "memberships",
        "member_activities",
        "payments",
        "payments_people",
        "payments_details",
        "people",
        "people_instruments",
        "person_people",
        "people_types_people",
        "plm_activities",
        "plm_activities_people",
        "produits",
        "teachers_activities",
        "types_activities",
        "type_payments",
        "type_people",
        "users_peoples",
        ];
        foreach ($tables as $key => $value) {
            # code...
            Schema::table($value, function (Blueprint $table) {
                $table->timestamps();
                $table->softDeletes();
            //
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
        $tables = [
        "activities",

        "famillies",
        "formulae",
        "formula_activities",
        "instruments",
        "locations",
        "memberships",
        "member_activities",
        "payments",
        "payments_people",
        "payments_details",
        "people",
        "people_instruments",
        "person_people",
        "people_types_people",
        "plm_activities",
        "plm_activities_people",
        "produits",
        "teachers_activities",
        "types_activities",
        "type_payments",
        "type_people",
        "users_peoples",
        ];
        foreach ($tables as $key => $value) {
            # code...
            Schema::table($value, function (Blueprint $table) {
                $table->dropColumn('created_at');
                $table->dropColumn('updated_at');
                $table->dropColumn('deleted_at');
            //
            });
        }
    }
}
