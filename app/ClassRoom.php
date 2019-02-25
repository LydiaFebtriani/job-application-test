<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
	protected $fillable = ['name', 'teacher_id'];

    public function teacher(){
    	return $this->belongsTo('App\Teacher');
    }
    public function students(){
    	return $this->hasMany('App\Student','class_id');
    }
}
