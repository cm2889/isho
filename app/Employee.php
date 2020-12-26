<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','designation_id','process_id','phone','status','employee_id',
    ];


    public function process(){
        return $this->belongsTo(process::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

}
