<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\LocationRequest as StoreRequest;
use App\Http\Requests\LocationRequest as UpdateRequest;

class LocationCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Location");
        $this->crud->setRoute("admin/location");
        $this->crud->setEntityNameStrings('lieu', 'lieux');

        $this->crud->setFromDb();
        
        $this->crud->addField([
            'name' => 'room',
            'label' => "Salle",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'adress',
            'label' => "Adresse",
            'type' => 'text'
        ]);
         $this->crud->addField([  
            'label' => "Ville",
            'type' => 'select',
            'name' => 'city_id', 
            'entity' => 'city', 
            'attribute' => 'name', 
            'model' => "App\Models\City" 
        ]);

        
        $this->crud->setColumnDetails('room', ['label' => 'Salle']);
        $this->crud->setColumnDetails('adress', ['label' => 'Adresse']);
        $this->crud->setColumnDetails('city_id',['label' => "Ville",
            'type' => 'select',
            'name' => 'city_id',
            'entity' =>'city',
            'attribute' => 'name',
            'model' => 'App\Models\City'
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
