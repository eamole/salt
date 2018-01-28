<?php

/*
	Eloquent ORM
	Easch class will return one record/object on request
*/
class Therapist  extends Eloquent {


	protected $fillable = array('id','name','phone','email','username','password','created_at','updated_at');	

	public function clients() {
		return $this->hasMany('Client','therapist');
	}

	public function appts() {
		return $this->hasMany('Appt','therapist');
	}

}
