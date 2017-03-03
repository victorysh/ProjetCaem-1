<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Type_personRequest as StoreRequest;
use App\Http\Requests\Type_personRequest as UpdateRequest;

class Type_personCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Type_person");
        $this->crud->setRoute("admin/type_person");
        $this->crud->setEntityNameStrings('type personne', 'type personnes');

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

    
         $this->crud->enableAjaxTable();


         $this->crud->enableExportButtons();

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
