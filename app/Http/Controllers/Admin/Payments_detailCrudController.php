<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Payments_detailRequest as StoreRequest;
use App\Http\Requests\Payments_detailRequest as UpdateRequest;

class Payments_detailCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\Payments_detail");
        $this->crud->setRoute("admin/payments_detail");
        $this->crud->setEntityNameStrings('détail paiement', 'détails paiement');



        $this->crud->setFromDb();


        $this->crud->addField([
            'name'  => 'name', 
            'label' => 'Nom', 
            'type'  => 'text'
            ]);

        $this->crud->addField([
                                'name' => 'price',
                                'label' => "Montant",
                                'type' => 'number',
                                'prefix' => "€",
                                ]);



        $this->crud->addField(
           
           [  
            'label' => "Activity_id",
            'type' => 'select',
            'name' => 'activity_id', 
            'entity' => 'id_activity', 
            'attribute' => 'name', 
            'model' => "App\Models\Activity", 
            ]);


        
        $this->crud->setColumnDetails('name',
            [
            'name'  => 'name', 
            'label' => 'Nom', 
           ]
        );

        $this->crud->setColumnDetails('price',
            [
            'name'  => 'price', 
            'label' => 'prix', 
           ]
        );

        $this->crud->setColumnsDetails(['activity_id'],
            [ 
            'label' => "Activity_id",
            'type' => 'select',
            'name' => 'activity_id', 
            'entity' => 'activity', 
            'attribute' => 'name', 
            'model' => "App\Models\Activity", 
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
