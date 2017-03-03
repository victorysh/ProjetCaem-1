<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Plm_activity extends Model
{
    use CrudTrait;

  
    protected $fillable = ['hour_start','hour_end','date','observation','location_id'];
  
	public function Location(){
        return $this->belongsTo('App\Models\Location');
    }
  
}
