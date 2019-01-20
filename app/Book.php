<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $dates = ['publish_date'];


    public function author(){
        return $this->belongsTo('App\Author');
    }

    public function genre(){
        return $this->belongsTo('App\Genre');
    }
}
