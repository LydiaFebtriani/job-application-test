<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['name', 'classroom_id'];
	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;

    /**
     * Get the student's classroom
     */
    public function classroom(){
    	return $this->belongsTo('App\Classroom');
    }
}
