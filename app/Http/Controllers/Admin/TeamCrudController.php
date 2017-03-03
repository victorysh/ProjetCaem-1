<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\CityRequest as StoreRequest;
use App\Http\Requests\CityRequest as UpdateRequest;

class TeamCrudController extends CrudController
    
{  

    public function setUp()
    {

 
        
        $this->crud->setModel("App\Models\Team");
        $this->crud->setRoute("admin/team");
        $this->crud->setEntityNameStrings('équipe', 'équipes');
        
        



        $this->crud->addField([
            'name'=>'name',
            'label'=>'Nom',
            'type'=>'text'
            ]);

        


        $this->crud->addField([
            'name'=>'firstname',
            'label'=>'Prénom',
            'type'=>'text'
            ]);


        $this->crud->addField([
            'name'=>'instrument',
            'label'=>'instrument',
            'type'=>'text'
            ]);

        $this->crud->addField([
            'name'  => 'type',
            'label' => 'type', 
            'type'  => 'select_from_array',
            'options' => ['Professeur' => 'Professeur','Administration' => 'Administration', 'Administrateur' => 'Administrateur', 'Bureau'=>'Bureau', 'Autre' => 'Autre'],
            'allows_null' => false,
            ]);

         $this->crud->addField([
            'name'  => 'status',
            'label' => 'statut', 
            'type'  => 'select_from_array',
            'options' => ['actif' => 'actif', 'inactif' => 'inactif'],
            'allows_null' => false,
            ]);

        $this->crud->addField([
            'name'=>'description',
            'label'=>'Description',
            'type'=>'text'
            ]);

         $this->crud->addField([
            'name'  => 'picture', 
            'label' => 'image', 
           'type' => 'upload',
            'upload' => true,
            'disk' => 'uploads'
            ]);


         $this->crud->addColumn('name');
         $this->crud->addColumn('firstname');
         $this->crud->addColumn('instrument');
         $this->crud->addColumn('type');
         $this->crud->addColumn('status');
         $this->crud->addColumn('description');
         $this->crud->addColumn('picture');



        $this->crud->setColumnDetails('name',
            [
            'name'  => 'name', 
            'label' => 'Nom', 
           ]
        );
        
        $this->crud->setColumnDetails('firstname',
            [
            'name'  => 'firstname', 
            'label' => 'Prénom', 
           ]
        );

       $this->crud->setColumnDetails('instrument',
            [
            'name'  => 'instrument', 
            'label' => 'Instrument', 
           ]
        );


        $this->crud->setColumnDetails('type',
            [
            'name'  => 'type',
            'label' => 'Type', 
            'type'  => 'select_from_array',
            'options' => ['Professeur' => 'Professeur','Administration' => 'Administration', 'Administrateur' => 'Administrateur', 'Bureau'=>'Bureau', 'Autre' => 'Autre'],
            'allows_null' => false,
           ]
        );

        $this->crud->setColumnDetails('status',
            [
            'name'  => 'status',
            'label' => 'statut', 
            'type'  => 'select_from_array',
            'options' => ['actif' => 'actif', 'inactif' => 'inactif'],
            'allows_null' => false,
           ]
        );

         $this->crud->setColumnDetails('description',
            [
            'name'  => 'description', 
            'label' => 'Description', 
           ]
        );

         $this->crud->setColumnDetails('picture',
                    [
                    'name'  => 'picture',  
                    'label' => 'image',  
                    'type'  => 'text'
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