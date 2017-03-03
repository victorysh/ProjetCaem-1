<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\People_types_personRequest as StoreRequest;
use App\Http\Requests\People_types_personRequest as UpdateRequest;

class People_types_personCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\People_types_person");
        $this->crud->setRoute("admin/people_types_person");
        $this->crud->setEntityNameStrings('personnes type personne', 'personnes type personnes');


        $this->crud->setFromDb();

        $this->crud->addField([
                                'name' => 'name',
                                'label' => "Nom",
                                'type' => 'text',
                                ]);

        $this->crud->setColumnDetails('name',
                                [
                                     'name' => 'name', 
                                     'label' => "Nom" 
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
