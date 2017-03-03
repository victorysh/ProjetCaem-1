<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Membership extends Model
{
    use CrudTrait;

    protected $fillable = [
        'date_start',
        'date_end',
        'person_id'
    ];

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

}
