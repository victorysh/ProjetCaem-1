<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\ActivityRequest as StoreRequest;
use App\Http\Requests\ActivityRequest as UpdateRequest;

class ActivityCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\Activity");
        $this->crud->setRoute("admin/activity");
        $this->crud->setEntityNameStrings('activité', 'activités');



        $this->crud->setFromDb();


        $this->crud->addField([
            'name'  => 'name',
            'label' => 'Nom', 
            'type'  => 'text'
            ]);
        
        $this->crud->addField(
           
           [  
            'label' => "Types",
            'type' => 'select',
            'name' => 'type_activity_id', 
            'entity' => 'type_activity', 
            'attribute' => 'name', 
            'model' => "App\Models\Types_activity" 
            ]);
        
        $this->crud->addField([
            'name'  => 'day', 
            'label' => 'Jour', 
            'type'  => 'select_from_array',
            'options' => [
                        'Lundi' => 'Lundi',
                        'Mardi' => 'Mardi',
                        'Mercredi' => 'Mercredi',
                        'Jeudi' => 'Jeudi',
                        'Vendredi' => 'Vendredi',
                        'Samedi' => 'Samedi',
                        'Dimanche' => 'Dimanche'
                        ],
            'allows_null' => false,
            ]);

        $this->crud->addField([
                    'name'  => 'status', 
                    'label' => 'Status', 
                    'type'  => 'select_from_array',
                    'options' => [
                                '1' => 'Disponible',
                                '0' => 'Indisponible'
                        
                                ],
                    'allows_null' => false,
                    ]);

        $this->crud->addField([
                    'name'  => 'description', 
                    'label' => 'Description', 
                    'type'  => 'textarea'
                    ]);

        $this->crud->addField([
                    'name'  => 'hour_start', 
                    'label' => 'Heure de début', 
                   'type' => 'time',
                    
                    ]);

        $this->crud->addField([
                    'name'  => 'hour_end', 
                    'label' => 'Heure de fin', 
                   'type' => 'time',
                    
                    ]);

        $this->crud->addField([
                    'name'  => 'year', 
                    'label' => 'Année', 
                   'type' => 'number',
                    
                    ]);

        $this->crud->addField(
           
           [ 
            'label' => "instruments",
            'type' => 'select2_multiple',
            'name' => 'instruments', 
            'entity' => 'instruments', 
            'attribute' => 'name', 
            'model' => "App\Models\Instrument", 
            'pivot' => true
            ]);
    
        
        $this->crud->setColumnDetails('name',
            [
            'name'  => 'name', 
            'label' => 'Nom', 
           ]
        );
        
        $this->crud->setColumnsDetails(['type_activity_id'],
            [
            'label' => 'Types', 
            'type' => 'select',
            'name' => 'type_activity_id', 
            'entity' => 'type_activity', 
            'attribute' => 'name', 
            'model' => "App\Models\Types_activity", 
            ]
        );



       

        $this->crud->setColumnDetails('day',
            [
             'name'  => 'day', 
            'label' => 'Jour', 
            'type'  => 'select_from_array',
            'options' => [
                        'Lundi' => 'Lundi',
                        'Mardi' => 'Mardi',
                        'Mercredi' => 'Mercredi',
                        'Jeudi' => 'Jeudi',
                        'Vendredi' => 'Vendredi',
                        'Samedi' => 'Samedi',
                        'Dimanche' => 'Dimanche'
                        ],
            'allows_null' => false,
          
           ]
        );

      


        $this->crud->setColumnDetails('status',
            [
             'name'  => 'status', 
            'label' => 'Status', 
            'type'  => 'boolean',
            'options' => [
                        '0' => 'Indisponible',
                        '1' => 'Disponible'
                        ],
     
           ]
        );

      

        $this->crud->setColumnDetails('description',
            [
            'name'  => 'description', 
            'label' => 'Description', 
            'type'  => 'textarea'
            ]);

       

        

        $this->crud->setColumnDetails('hour_start',
            [
            'name'  => 'hour_start', 
            'label' => 'Heure de début', 
            'type'  => 'text'
            ]);
        
      

        $this->crud->setColumnDetails('hour_end',
            [
            'name'  => 'hour_end', 
            'label' => 'Heure de fin', 
            'type'  => 'text'
            ]);

       

        $this->crud->setColumnDetails('year',
            [
            'name'  => 'year', 
            'label' => 'Année', 
            'type'  => 'text'
            ]);

        

         $this->crud->removeColumns(['description']);

        
        
         $this->crud->enableDetailsRow();

         $this->crud->allowAccess('details_row');
     
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

      public function showDetailsRow($id)
    {
        $this->crud->hasAccessOrFail('details_row');

        $data = \App\Models\Activity::with('member_activities')
                                    
                                    ->with('teachers_activities')
                                    ->with('instruments')
                                    ->find($id);
        

        return view('admin/details_row_activity', ['data' => $data]);
    }
}
