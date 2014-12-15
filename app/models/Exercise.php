<?php

class Exercise extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Exercise belongs to User
    * Define an inverse one-to-many relationship.
    */
	public function user() {

        return $this->belongsTo('User');

    }

    /**
    * Books belong to many categorys
    */
    public function categories() {

        return $this->belongsToMany('Category');

    }
    
    public function results() {
        # Exercise has many Results
        # Define a one-to-many relationship.
        return $this->hasMany('Result');
    }
    
}    