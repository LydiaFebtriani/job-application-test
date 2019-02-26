<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{ 
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['name'];
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;

    /**
     * Get the teacher's classrooms
     */
    public function classrooms(){
    	return $this->hasMany('App\Classroom');
    }
}
