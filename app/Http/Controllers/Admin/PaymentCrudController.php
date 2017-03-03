<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\PaymentRequest as StoreRequest;
use App\Http\Requests\PaymentRequest as UpdateRequest;

class PaymentCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\Payment");
        $this->crud->setRoute("admin/payment");
        $this->crud->setEntityNameStrings('paiement', 'paiements');



        $this->crud->setFromDb();

        $this->crud->addField([
                                'name' => 'price',
                                'label' => "Montant",
                                'type' => 'number',
                                'prefix' => "€",
                                ]);

        $this->crud->addField([
                                'name' => 'date',
                                'label' => "Date de paiement",
                                'type' => 'datetime_picker',

                                'datetime_picker_options' => [
                                                                'format' => 'DD/MM/YYYY',
                                                                'language' => 'fr']
                                ]);

        $this->crud->addField(
           
           [  
            'label' => "Type de paiement",
            'type' => 'select',
            'name' => 'type_payment_id', 
            'entity' => 'type_payment', 
            'attribute' => 'name', 
            'model' => "App\Models\Type_payment", 
            
            
            ]);

           $this->crud->addField(
           
           [ 
            'label' => "Personne",
            'type' => 'select2_multiple',
            'name' => 'payments_people', 
            'entity' => 'payments_people', 
            'attribute' => 'fullname',
            'model' => "App\Models\Person", 
             'pivot' => true
            ]);

        $this->crud->setColumnDetails('price',
                                [
                                     'name' => 'price', 
                                     'label' => "Montant" 
                                 ]);

        $this->crud->setColumnDetails('date',
                                [
                                'name' => 'date',
                                'label' => "Date de paiement",
                                
                                ]);

        $this->crud->setColumnDetails('type_payment_id',
            [
            'label' => 'Type de paiement', 
            'type' => 'select',
            'name' => 'type_payment_id', 
            'entity' => 'type_payment', 
            'attribute' => 'name', 
            'model' => "App\Models\Type_payment", 
            ]
        );

     

        $this->crud->addColumn('people');

        $this->crud->setColumnsDetails(['people'],
            [
            'label' => 'Personne', 
            'type' => 'select_multiple',
            'name' => 'payments_people', 
            'entity' => 'payments_people', 
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
