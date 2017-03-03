<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Payments_personRequest as StoreRequest;
use App\Http\Requests\Payments_personRequest as UpdateRequest;

class Payments_personCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Payments_person");
        $this->crud->setRoute("admin/payments_person");
        $this->crud->setEntityNameStrings('paiement personne', 'paiements personne');



        $this->crud->setFromDb();

       
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
