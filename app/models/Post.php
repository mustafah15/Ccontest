<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 3/10/15
 * Time: 12:32 AM
 */

class Post extends Eloquent{

    protected $table = 'posts';

    protected  $fillable = ['title','content','by'];


    public function comments()
    {
        return $this->hasMany('Comment','post');
    }



} 