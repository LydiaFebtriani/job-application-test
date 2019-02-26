<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['name', 'teacher_id'];
    public $timestamps = false;
    
    public function teacher(){
    	return $this->belongsTo('App\Teacher');
    }
    public function students(){
    	return $this->hasMany('App\Student');
    }
}
