<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Types_activityRequest as StoreRequest;
use App\Http\Requests\Types_activityRequest as UpdateRequest;

class Types_activityCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Types_activity");
        $this->crud->setRoute("admin/types_activity");
        $this->crud->setEntityNameStrings('type activité', 'types activités');

        $this->crud->setFromDb();

        $this->crud->addField([
            'name'  => 'name', 
            'label' => 'Nom', 
            'type'  => 'text'
            ]);

        $this->crud->setColumnDetails('name',
            [
            'name'  => 'name', 
            'label' => 'Nom', 
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
