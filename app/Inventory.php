<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function price(){
        return $this->belongsTo(Price::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}