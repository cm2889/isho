<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DesignationImport;
use App\Price;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{
    public function importDesignation()
    {

        return view('designation.excel');

    }
    public function storeDesignation( Request $request,Product $product, Price $price)
    {

        $request['user_id'] = Auth::user()->id;
        $request['price_id'] = $price->id;
        $request->validate([
            'file' => 'required|file|max:2048|mimes:xls,xlsx',

        ]);


        Excel::import(new DesignationImport, request()->file('file'));


        return redirect()->route('product.price.index',compact('product'));


    }
}
