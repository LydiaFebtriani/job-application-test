<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = ['name', 'classroom_id'];
	public $timestamps = false;

    public function classroom(){
    	return $this->belongsTo('App\Classroom');
    }
}
