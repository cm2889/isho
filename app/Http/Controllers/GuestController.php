<?php

namespace App\Http\Controllers;

use App\Price;
use App\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
     //Product List
    public function product(){
        $products=Product::all()->sortByDesc('id');
        return view('guest.product',compact('products'));
    }
    public function color(Product $product)
    {

      $prices= Price::withTrashed()->where('product_id',$product->id)->get();
        return view('guest.color',compact('prices','product'));
    }

}
