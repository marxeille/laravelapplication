<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['path'];
    protected $path = '/images/';

    public function user(){
        return $this->hasOne('App\User');
    }
    public function getPathAttribute($value){

            return $this->path . $value;

    }
}
