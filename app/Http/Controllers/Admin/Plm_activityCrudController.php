<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Plm_activityRequest as StoreRequest;
use App\Http\Requests\Plm_activityRequest as UpdateRequest;

class Plm_activityCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Plm_activity");
        $this->crud->setRoute("admin/plm_activity");
        $this->crud->setEntityNameStrings('planing activité', 'planing activités');



        $this->crud->setFromDb();


         $this->crud->addField( [  
            'name' => 'hour_start',
            'label' => 'heure de début',
            'type' => 'time'
        ]);

        $this->crud->addField( [  
            'name' => 'hour_end',
            'label' => 'heure de fin',
            'type' => 'time'
        ]);

        $this->crud->addField(
            [
            'label' => 'Lieu', 
            'type' => 'select2',
            'name' => 'location_id', 
            'entity' => 'getFullAdressAttribute', 
            'attribute' => 'fulladress', 
            'model' => "App\Models\Location", 
            ]
        );

       
        $this->crud->setColumnDetails('hour_start',
            [
            'name'  => 'hour_start', 
            'label' => 'Heure de début', 
           ]
        );

        $this->crud->setColumnDetails('hour_end',
            [
            'name'  => 'hour_end', 
            'label' => 'Heure de fin', 
           ]
        );

        $this->crud->setColumnsDetails(['location_id'],
            [
            'label' => 'Lieu', 
            'name' => 'location_id', 
            'type' => 'select',
            'entity' => 'location', 
            'attribute' => 'fulladress', 
            'model' => "App\Models\Location", 
            ]
         );

    }

	public function store(StoreRequest $request)
	{

        $redirect_location = parent::storeCrud();

        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{

        $redirect_location = parent::updateCrud();

        return $redirect_location;
	}
}
