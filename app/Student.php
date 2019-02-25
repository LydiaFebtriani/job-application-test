<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = ['name', 'class_id'];

    public function classroom(){
    	return $this->belongsTo('App\ClassRoom','class_id');
    }
}
