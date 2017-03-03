<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class District extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name', 
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    
    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

}
