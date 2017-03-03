<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\CityRequest as StoreRequest;
use App\Http\Requests\CityRequest as UpdateRequest;

class CityCrudController extends CrudController
    
{  

    public function setUp()
    {

 
        
        $this->crud->setModel("App\Models\City");
        $this->crud->setRoute("admin/city");
        $this->crud->setEntityNameStrings('city', 'Villes');
        
        



        $this->crud->addField([
            'name'=>'name',
            'label'=>'Nom',
            'type'=>'text'
            ]);

        


        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Nom',
            'type'=>'text'
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