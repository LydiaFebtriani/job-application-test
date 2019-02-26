<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
	protected $fillable = ['name'];
	public $timestamps = false;

    public function classrooms(){
    	return $this->hasMany('App\Classroom');
    }
}
