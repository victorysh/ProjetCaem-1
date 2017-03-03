<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class People_types_person extends Model
{
    use CrudTrait;

   
    protected $fillable = ['name'];
 

	public function type_person()
    {
        return $this->belongsTo('App\Models\Type_person','type_person_id');

    }

    public function people()
    {
        return $this->belongsTo('App\Models\Person','person_id');

    }


}
