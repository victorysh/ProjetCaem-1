<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Activity_web extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name',
        'type_activity_id',
        'picture_1',
        'picture_2',
        'age_min',
        'age_max',
        'description',
        'status',
        'when',
        'price',
        'status'
    ];
 
    public function type_activity()
    {
        return $this->belongsTo('App\Models\Types_activity');
    }

    public function setPicture1Attribute($value)
    {
        $attribute_name = "picture_1";
        $disk = "uploads";
        $destination_path = "activity";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setPicture2Attribute($value)
    {
        $attribute_name = "picture_2";
        $disk = "uploads";
        $destination_path = "activity";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

  
}
