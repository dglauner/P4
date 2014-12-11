<?php

class Result extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * Results belong to many categorys
    */
    public function exercise() {

        return $this->belongsTo('Exercise');

    }
}
