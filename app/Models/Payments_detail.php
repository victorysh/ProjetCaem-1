<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Payments_detail extends Model
{
    use CrudTrait;


    protected $fillable = ['name',
    					  'price',
    					  'activity_id'
    ];

	public function activity(){
        return $this->belongsTo('App\Models\Activity');
    }    

}
