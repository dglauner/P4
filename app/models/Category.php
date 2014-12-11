<?php

class Category extends Eloquent
{
    
    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Categorys belong to many Exercises
    */
    public function exercises() {

        return $this->belongsToMany('Exercise');

    }

}