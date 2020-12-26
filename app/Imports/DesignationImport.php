<?php

namespace App\Imports;

use App\Designation;
use App\Inventory;

use App\Price;

use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class DesignationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Inventory([


            'user_id'=>Auth::user()->id,
            'price_id'=>$row[0],
            'count'     => $row[1],
            'time'     => $row[2],

        ]);
    }
}
