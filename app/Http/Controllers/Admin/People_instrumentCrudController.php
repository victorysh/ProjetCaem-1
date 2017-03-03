<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\People_instrumentRequest as StoreRequest;
use App\Http\Requests\People_instrumentRequest as UpdateRequest;

class People_instrumentCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\People_instrument");
        $this->crud->setRoute("admin/people_instrument");
        $this->crud->setEntityNameStrings('personnes instrument', 'personnes instruments');



        $this->crud->setFromDb();
        
         $this->crud->addField(
           
           [  
            'label' => "Personne",
            'type' => 'select',
            'name' => 'person_id', 
            'entity' => 'person', 
            'attribute' => 'name',
            'model' => "App\Models\Person" 
            ]);
        
        $this->crud->addField(
           
           [  
            'label' => "Instruments",
            'type' => 'select',
            'name' => 'instrument_id', 
            'entity' => 'instrument', 
            'attribute' => 'name', 
            'model' => "App\Models\Instrument" 
            ]);
        
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
