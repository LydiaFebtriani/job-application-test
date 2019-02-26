<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'teacher_id'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the teacher assigned to the classroom.
     */
    public function teacher(){
    	return $this->belongsTo('App\Teacher');
    }

    /**
     * Get the students assigned to the classroom.
     */
    public function students(){
    	return $this->hasMany('App\Student');
    }
}
