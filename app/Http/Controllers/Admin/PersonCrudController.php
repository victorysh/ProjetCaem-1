<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\PersonRequest as StoreRequest;
use App\Http\Requests\PersonRequest as UpdateRequest;

class PersonCrudController extends CrudController
{

    public function setUp()
    {

        $this->crud->setModel("App\Models\Person");
        $this->crud->setRoute("admin/person");
        $this->crud->setEntityNameStrings('Personne', 'Personnes');


        $this->crud->setFromDb();

        $this->crud->addField([
            'name'  => 'gender', 
            'label' => 'Civilité', 
            'type'  => 'select_from_array',
            'options' => ['Mr' => 'Mr', 'Mme' => 'Mme'],
            'allows_null' => false,
        ]);
        $this->crud->addField([
            'name'  => 'name', 
            'label' => 'Prénom', 
            'type'  => 'text'
        ]);
        $this->crud->addField([
            'name'  => 'family_name',
            'label' => 'Nom de famille', 
            'type'  => 'text'
        ]);
        $this->crud->addField([
            'name'  => 'mail', 
            'label' => 'Email', 
            'type'  => 'email'
        ]);
        $this->crud->addField([
            'name'  => 'tel_fix', 
            'label' => 'Tel. fix', 
            'type'  => 'text'
        ]);
        $this->crud->addField([
            'name'  => 'tel_mob', 
            'label' => 'Tel. mobile', 
            'type'  => 'text'
        ]);
        $this->crud->addField([
            'name'  => 'postal_code', 
            'label' => 'Code postal', 
            'type'  => 'number'
        ]);
        $this->crud->addField([
            'name'  => 'adress', 
            'label' => 'Adresse', 
            'type'  => 'text'
        ]);
        $this->crud->addField([
            'name'  => 'birthday', 
            'label' => 'Date de naissance', 
            'type' => 'datetime_picker',
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY',
                'language' => 'fr']
        ]);
        $this->crud->addField([
            'name'  => 'observation',
            'label' => 'Observation', 
            'type'  => 'textarea'
        ]);

        $this->crud->addField([
            'name'  => 'code_analytique', 
            'label' => 'code_analytique',
            'type'  => 'textarea'
        ]);
        $this->crud->addField([
            'name'  => 'image_right',
            'label' => 'Droit à l\'image', 
            'type'  => 'select_from_array',
            'options' => ['Oui' => 'Oui', 'Non' => 'Non'],
            'allows_null' => false,
        ]);

        $this->crud->addField([ 
            'label' => "Ville",
            'type' => 'select',
            'name' => 'city_id',
            'entity' => 'city', 
            'attribute' => 'name', 
            'model' => "App\Models\City" 
        ]);
        $this->crud->addField([  
            'label' => "Quartier",
            'type' => 'select',
            'name' => 'district_id', 
            'entity' => 'district', 
            'attribute' => 'name', 
            'model' => "App\Models\District" 
        ]);
        $this->crud->addField([  
            'label' => "Types",
            'type' => 'select2_multiple',
            'name' => 'type_people', 
            'entity' => 'type_people', 
            'attribute' => 'name', 
            'model' => "App\Models\Type_person", 
            'pivot' => true
        ]);
        $this->crud->addField([  
            'label' => "Activités",
            'type' => 'select2_multiple',
            'name' => 'people_activities', 
            'entity' => 'people_activities', 
            'attribute' => 'name', 
            'model' => "App\Models\Activity", 
            'pivot' => true
        ]);
        $this->crud->addField([  
            'label' => "Responsable légal",
            'type' => 'select2_multiple',
            'name' => 'people_people', 
            'entity' => 'people_people', 
            'attribute' => 'fullname', 
            'model' => "App\Models\Person", 
            'pivot' => true
        ]);
        $this->crud->addField([
            'name'  => 'status', 
            'label' => 'Status', 
            'type'  => 'select_from_array',
            'options' => [
                1 => 'Active',
                0 => 'Inactive'
                
            ],
            'allows_null' => false,
        ]);

        $this->crud->setColumnDetails('status',[
             'name'  => 'status', 
            'label' => 'Status', 
            'type'  => 'boolean',
            'options' => [
                0 => 'Inactive',
                1 => 'Active'
            ],
        ]);
        $this->crud->setColumnDetails('gender',[
            'name'  => 'gender',
            'label' => 'Civilité', 
            'type'  => 'select_from_array',
            'options' => ['Mr' => 'Mr', 'Mme' => 'Mme'],
            'allows_null' => false,
        ]);
        $this->crud->setColumnDetails('name',[
            'name'  => 'name', 
            'label' => 'Prénom', 
        ]);
        $this->crud->setColumnDetails('family_name',[
            'name'  => 'family_name', 
            'label' => 'Nom de famille', 
        ]);
        $this->crud->addColumn('rattache');
        $this->crud->setColumnsDetails(['rattache'],
            [
            'label' => 'Responsable légal', 
            'type' => 'select_multiple',
            'name' => 'people_people', 
            'entity' => 'people_people', 
            'attribute' => 'fullname', 
            'model' => "App\Models\Person", 
        ]);
        $this->crud->setColumnDetails('mail',[
            'name'  => 'mail', 
            'label' => 'Email', 
        ]);
        $this->crud->setColumnDetails('tel_fix',[
            'name'  => 'tel_fix', 
            'label' => 'Tel. fix',
        ]);
        $this->crud->setColumnDetails('tel_mob',[
            'name'  => 'tel_mob', 
            'label' => 'Tel. mobile', 
        ]);
        $this->crud->setColumnDetails('code_analytique',
            [
            'name'  => 'code_analytique', 
            'label' => 'Code analytique', 
           ]
        );
        $this->crud->removeColumns(['year_old', 'postal_code','birthday','adress', 'observation', 'city_id', 'district_id', 'image_right', 'code_analytique', 'types']);

        $this->crud->enableDetailsRow();

        $this->crud->allowAccess('details_row');
      
        /*$this->crud->enableAjaxTable();*/

        $this->crud->enableExportButtons();
        
    }

	public function store(StoreRequest $request)
	{
        return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
        return parent::updateCrud();
	}

    public function showDetailsRow($id)
    {

        $this->crud->hasAccessOrFail('details_row');

        $data = \App\Models\Person::with('type_people')
                                    ->with('city')
                                    ->with('people_people')
                                    ->with('district')
                                    ->with('membership')
                                    ->with('people_activities')
                                    ->find($id);
        
        foreach($data['people_activities'] as $key => $value){
            $teacher = \App\Models\Activity::with('teachers_activities')->find($value['id']);
            $data['teachers_'.$value['id']]= $teacher['teachers_activities'];
        }
   
        return view('admin/details_row_person', ['data' => $data]);

    }

}
