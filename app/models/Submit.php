<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 3/13/15
 * Time: 3:34 AM
 */

class Submit extends Eloquent {

    protected $table ='submissions';

    protected $fillable=['by','code','score','response','post_id'];


    public function user()
    {
        return $this->belongsTo('User','id','by');
    }

    public function response()
    {
        return $this->has('Response','id','post_id');
    }

} 