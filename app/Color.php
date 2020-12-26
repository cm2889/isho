<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;
    protected $guarded=[];


    public function price(){
        return $this->hasMany(Price::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
