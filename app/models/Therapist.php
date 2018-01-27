<?php

/*
	Eloquent ORM
	Easch class will return one record/object on request
*/
class Therapist  extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	// protected $table = 'authors'; 	// authors is guessed by ORM
	protected $fillable = array('id','name','phone','email','username','password','created_at','updated_at');	// block updates to this attribute

}
