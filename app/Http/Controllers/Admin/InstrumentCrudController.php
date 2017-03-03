<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\InstrumentRequest as StoreRequest;
use App\Http\Requests\InstrumentRequest as UpdateRequest;

class InstrumentCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Instrument");
        $this->crud->setRoute("admin/instrument");
        $this->crud->setEntityNameStrings('instrument', 'instruments');

        $this->crud->addField([
            'name' => 'name',
            'label' => "nom",
            'type' => 'text'
        ]);
        $this->crud->addColumn([
            'name' => 'name',
            'label' => "nom",
            'type' => 'text'
        ]);

    }

	public function store(StoreRequest $request)
	{
        return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
        return parent::updateCrud();
	}

}
