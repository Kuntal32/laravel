<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
	protected $primaryKey = 'page_id';
    protected $fillable = [
        'name', 'title','metaTitle','metaDescription','content'
    ];
}
