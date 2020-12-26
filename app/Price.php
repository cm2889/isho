<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function product1(){
        return $this->hasMany(Product::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color1(){
        return $this->hasMany(Color::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
