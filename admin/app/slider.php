<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    //
	protected $table='slider';
    protected $primaryKey = 'slider_id';
    protected $fillable = [
       'title','description','image'
    ];
}
