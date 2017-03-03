<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;

class Team extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name',
        'firstname',
        'instrument',
        'type',
        'status',
        'picture',
        'description'
    ];
	

public function setPictureAttribute($value)
    {
        $attribute_name = "picture";
        $disk = "uploads";
        $destination_path = "photo_team";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
