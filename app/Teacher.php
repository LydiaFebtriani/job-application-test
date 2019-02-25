<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = ['name'];

    public function classrooms(){
    	return $this->hasMany('App\ClassRoom');
    }
}
