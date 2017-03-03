<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Type_paymentRequest as StoreRequest;
use App\Http\Requests\Type_paymentRequest as UpdateRequest;

class Type_paymentCrudController extends CrudController
{

    public function setUp()
    {


        $this->crud->setModel("App\Models\Type_payment");
        $this->crud->setRoute("admin/type_payment");
        $this->crud->setEntityNameStrings('type paiment', 'type paiements');


        $this->crud->setFromDb();

         $this->crud->addField([
            'name'=>'name',
            'label'=>'Nom',
            'type'=>'text'
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
