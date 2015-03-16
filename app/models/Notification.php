<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 3/10/15
 * Time: 1:16 AM
 */

class Notification extends Eloquent {

    protected $table = 'notification';
    protected $fillable = ['by','content','link','readed'];



}