<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\MembershipRequest as StoreRequest;
use App\Http\Requests\MembershipRequest as UpdateRequest;

class MembershipCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\Membership");
        $this->crud->setRoute("admin/membership");
        $this->crud->setEntityNameStrings('adhérent', 'adhérents');


        $this->crud->setFromDb();




        $this->crud->addField([
            'name'  => 'date_start', 
            'label' => "Date d'adhésion", 
            'type'  => 'datetime_picker',
            'datetime_picker_options' => [
                                             'format' => 'DD/MM/YYYY',
                                            'language' => 'fr'
                                        ]
            ]);

        $this->crud->addField([
            'name'  => 'date_end', 
            'label' => "Date de fin d'adhésion", 
            'type'  => 'datetime_picker',
            'datetime_picker_options' => [
                                             'format' => 'DD/MM/YYYY',
                                            'language' => 'fr'
                                         ]
            ]);


         $this->crud->addField(
            [
            'label' => 'Nom personne', 
            'type' => 'select2',
            'name' => 'person_id', 
            'entity' => 'getFullNameAttribute', 
            'attribute' => 'fullname', 
            'model' => "App\Models\Person", 
            ]
        );

      
            $this->crud->setColumnsDetails(['date_end'],
            [
                 'name'  => 'date_end', 
            'label' => "Date de fin d'adhésion", 
            'type'  => 'datetime_picker',
            'datetime_picker_options' => [
                                             'format' => 'DD/MM/YYYY',
                                            'language' => 'fr'
                                        ]
            ]
            );


         $this->crud->setColumnsDetails(['date_start'],
            [
                 'name'  => 'date_start', 
            'label' => "Date d'adhésion", 
            'type'  => 'datetime_picker',
            'datetime_picker_options' => [
                                             'format' => 'DD/MM/YYYY',
                                            'language' => 'fr'
                                        ]
            ]
            );


        
         $this->crud->setColumnsDetails(['person_id'],
            [
            'label' => 'Nom personne', 
            'name' => 'person_id', 
            'type' => 'select',
            'entity' => 'person', 
            'attribute' => 'fullname', 
            'model' => "App\Models\Person", 
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
