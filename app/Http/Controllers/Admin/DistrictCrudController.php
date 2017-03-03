<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\DistrictRequest as StoreRequest;
use App\Http\Requests\DistrictRequest as UpdateRequest;

class DistrictCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\District");
        $this->crud->setRoute("admin/district");
        $this->crud->setEntityNameStrings('quartier','quartiers');


        $this->crud->setFromDb();
        
         $this->crud->addField([
            'name'  => 'name', 
            'label' => 'Nom', 
            'type'  => 'text'
            ]);
        
        $this->crud->addField(
           
           [  
            'label' => "Ville",
            'type' => 'select',
            'name' => 'city_id', 
            'entity' => 'city', 
            'attribute' => 'name', 
            'model' => "App\Models\City" 
            ]);
        
        
        
        
        


         $this->crud->setColumnDetails('name',
            [
            'name'  => 'name', 
            'label' => 'Nom', 
           ]
        ); 
        
           $this->crud->setColumnDetails('city_id',
            [
            'label' => 'Ville', 
            'type' => 'select',
            'name' => 'city_id', 
            'entity' => 'city', 
            'attribute' => 'name', 
            'model' => "App\Models\City", 
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