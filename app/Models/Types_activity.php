<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Types_activity extends Model
{
    use CrudTrait;

 
    protected $fillable = ['name'];
   
	 public function activities(){
        return $this->hasMany('App\Models\Activity','type_activity_id');
    }

	 public function activities_web(){
        return $this->hasMany('App\Models\Activity_web','type_activity_id');
    }
  
}
