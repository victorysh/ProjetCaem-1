<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class City extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name'
    ];

	public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

}
