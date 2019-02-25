<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    public function teacher(){
    	return $this->belongsTo('Teacher');
    }
    public function students(){
    	return $this->hasMany('Student');
    }
}
