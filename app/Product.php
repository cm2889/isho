<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $fillable = [
        'product_name','image','user_id'
    ];


    /*public function price(){
        return $this->hasMany(Price::class);
    }*/

    public function user(){
        return $this->belongsTo(User::class);
    }
}
