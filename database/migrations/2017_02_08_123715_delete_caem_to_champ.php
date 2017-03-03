<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteCaemToChamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $tables=[
                'activities' => ['type_activity' => 'type_activity'],
                'districts' => ['city' => 'city'],
                'formula_activities' => ['activity' => 'activity', 'formula' => 'formula'],
                'locations' => ['city' => 'city'],
                'memberships' => ['people' => 'person'],
                'member_activities' => ['activity' => 'activity', 'people' => 'person'],

                'payments' => ['type_payment' => 'type_payment'],
                'payments_details' => ['activity' => 'activity'],
                'payments_people' => ['payment' => 'payment', 'people' => 'person', 'produit' => 'produit'],
                'people' => ['city' => 'city', 'district' => 'district', 'familly' => 'familly', 'city' => 'city'],
                'people_instruments' => ['people' => 'person', 'instrument' => 'instrument'],
                'people_types_people' => ['people' => 'person', 'type_people' => 'type_person'],
                'person_people' => ['people' => 'person', 'people_link' => 'people_link'],
                'plm_activities' => ['location' => 'location'],
                'plm_activities_people' => ['plm_activity' => 'plm_activity', 'member_activity' => 'member_activity', 'prof_activity' => 'teachers_activity'],
                'produits' => ['activity' => 'activity'],
                'teachers_activities' => ['activity' => 'activity', 'people' => 'person'],
                'type_people' => ['people' => 'person'],
                'users_people' => ['people' => 'person', 'user' => 'user'],
                ];

            foreach ($tables as $key => $values) {
                # code...
                $GLOBALS['values_tables'] = $values;
                Schema::table($key, function (Blueprint $table) {

                foreach ($GLOBALS['values_tables'] as $i => $value) {
                        # code...
                    if (Schema::hasColumn($table->getTable(), 'caem_'.$i.'_id'))
                        {
                            $table->renameColumn('caem_'.$i.'_id', $value.'_id');
                        }



                    }


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
        $tables=[
                'activities' => ['type_activity' => 'type_activity'],
                'districts' => ['city' => 'city'],
                'formula_activities' => ['activity' => 'activity', 'formula' => 'formula'],
                'locations' => ['city' => 'city'],
                'memberships' => ['people' => 'person'],
                'member_activities' => ['activity' => 'activity', 'people' => 'person'],

                'payments' => ['type_payment' => 'type_payment'],
                'payments_details' => ['activity' => 'activity'],
                'payments_people' => ['payment' => 'payment', 'people' => 'person', 'produit' => 'produit'],
                'people' => ['city' => 'city', 'district' => 'district', 'familly' => 'familly', 'city' => 'city'],
                'people_instruments' => ['people' => 'person', 'instrument' => 'instrument'],
                'people_types_people' => ['people' => 'person', 'type_people' => 'type_person'],
                'person_people' => ['people' => 'person', 'people_link' => 'people_link'],
                'plm_activities' => ['location' => 'location'],
                'plm_activities_people' => ['plm_activity' => 'plm_activity', 'member_activity' => 'member_activity', 'prof_activity' => 'teachers_activity'],
                'produits' => ['activity' => 'activity'],
                'teachers_activities' => ['activity' => 'activity', 'people' => 'person'],
                'type_people' => ['people' => 'person'],
                'users_peoples' => ['people' => 'person', 'user' => 'user'],
                ];

            foreach ($tables as $key => $values) {
                # code...
                $GLOBALS['values_tables'] = $values;

                Schema::table($key, function (Blueprint $table) {

                foreach ($GLOBALS['values_tables'] as $i => $value) {
                        # code...
                        if (Schema::hasColumn($table->getTable(), $value.'_id'))
                        {
                            $table->renameColumn( $value.'_id','caem_'.$i.'_id');
                        }

                    }


                });
            }
    }
}

// $tables=[
//                 'activities' => 'type_activity',
//                 'districts' => 'city',
//                 'forpula_activities' => 'activity',
//                 'forpula_activities' => 'formula',
//                 'locations' => 'city',
//                 'memberships' => 'people',
//                 'member_activities' => 'activity',
//                 'member_activities' => 'people',
//                 'payments' => 'type_payment',
//                 'payments_details' => 'activity',
//                 'payments_people' => 'payment',
//                 'payments_people' => 'people',
//                 'payments_people' => 'produit',
//                 'people' => 'city',
//                 'people' => 'district',
//                 'people' => 'familly',
//                 'people' => 'city',
//                 'people_instruments' => 'people',
//                 'people_instruments' => 'instrument',
//                 'people_types_people' => 'people',
//                 'people_types_people' => 'type_people',
//                 'person_people' => 'people',
//                 'person_people' => 'people_link',
//                 'plm_activities' => 'location',
//                 'plm_activities_people' => 'plm_activity',
//                 'plm_activities_people' => 'member_activity',
//                 'plm_activities_people' => 'prof_activity',
//                 'produits' => 'activity',
//                 'teachers_activities' => 'activity',
//                 'teachers_activities' => 'people',
//                 'type_people' => 'people',
//                 'users_people' => 'people',
//                 'users_people' => 'user',
//                 ];
