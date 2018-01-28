<?php

/*
	Eloquent ORM
	Easch class will return one record/object on request
*/
class Appt extends Eloquent {



	protected $fillable = array('id','name','phone','email','username','password','created_at','updated_at');	


	public function therapist() {
		return $this->belongsTo('Therapist','id');
	}

	public function client() {
		return $this->belongsTo('Client','id');
	}
}
