<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

class ArticleCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

       
        $this->crud->setModel("App\Models\Article");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('actualité', 'actualités');

        

        
        $this->crud->addColumn([
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                            ]);
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Titre',
                            ]);
        $this->crud->addColumn([
                                'name' => 'featured',
                                'label' => "A la une",
                                'type' => 'check',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Categorie',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);

      
        $this->crud->addField([   
                                'name' => 'title',
                                'label' => 'Titre',
                                'type' => 'text',
                                'placeholder' => 'Votre titre ici',
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => "lien de l'actualité",
                                'type' => 'text',
                                'hint' => 'il sera généré automatiquement si il reste vide.',
                               
                            ]);

        $this->crud->addField([    
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                                'value' => date('Y-m-d'),
                            ], 'create');
        
        $this->crud->addField([    
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ], 'update');

        $this->crud->addField([    
                                'name' => 'content',
                                'label' => 'Contenu',
                                'type' => 'ckeditor',
                                'placeholder' => 'Votre texte ici',
                            ]);

        $this->crud->addField([    
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'browse',
                            ]);

        $this->crud->addField([    
                                'label' => 'Categorie',
                                'type' => 'select2',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);

       
        $this->crud->addField([    
                                'name' => 'status',
                                'label' => 'Status',
                                'type' => 'enum',
                            ]);

        $this->crud->addField([   
                                'name' => 'featured',
                                'label' => "A la une",
                                'type' => 'checkbox',
                            ]);

        $this->crud->addField([
            'name'  => 'status', 
            'label' => 'Status', 
            'type'  => 'select_from_array',
            'options' => [
                        '1' => 'En ligne',
                        '0' => 'Hors ligne'
                        ],
            'allows_null' => false,
            ]);

        $this->crud->setColumnDetails('status',
            [
             'name'  => 'status', 
            'label' => 'Status', 
            'type'  => 'boolean',
            'options' => [
                        '1' => 'En ligne',
                        '0' => 'Hors ligne'
                        ],
            'allows_null' => false,
          
           ]
        );

        $this->crud->enableAjaxTable();
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
