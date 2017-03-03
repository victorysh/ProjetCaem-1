<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Location extends Model
{
    use CrudTrait;

    protected $fillable=[
        'room',
        'adress',
        'city_id'
    ];

	public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function membership()
    {
        return $this->belongsTo('App\Models\Membership');
    }

    public function getFullAdressAttribute() 
    {
   		return $this->city_id.' '.$this->adress.' '.$this->room;
    }

}
