<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class People_instrument extends Model
{
    use CrudTrait;

 

	    public function people_instruments()
    {
        return $this->belongsToMany('App\Models\Instrument', 'people_instruments','person_id','instrument_id');

    }


}
