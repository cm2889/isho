<?php

namespace App\Http\Controllers;

use App\Color;
use App\Price;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index(Product $product)
    {
        $prices= Price::withTrashed()->where('product_id',$product->id)->get();
        return view('prices.index',compact('prices','product'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $price= new Price();
        $colors= Color::all()->sortByDesc('id');
        return view('prices.create', compact('product','price','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $request['user_id'] = Auth::user()->id;
        $request['product_id'] = $product->id;

        if($price = Price::create($this->validatePrice())) {
            Session::put("success"," Successfully Added Price !");
        }
        else{
            Session::put("danger"," Please Try again !");
        }
        $this->storeFile($price);
//

        return redirect()->route('product.price.index',compact('product'));
    }
    private function validatePrice()
    {
        return request()->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'user_id' => 'required',
            'price'=>'required',
            'image'=>'required',
        ]);
    }
    private function storeFile($price)
    {
        if (request()->has('image')) {
            $price->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
            $img=Image::make(public_path('storage/'.$price->image))->resize(240,200);
            $img->save();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Price $price)
    {
        $colors= Color::all()->sortByDesc('id');
        return view('prices.show',compact('product','price','colors'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Price $price)
    {
        $colors= Color::all()->sortByDesc('id');
        return view('prices.edit',compact('product','price','colors'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, Price $price, Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request['product_id'] = $product->id;
        $request['image'] = 'https://picsum.photos/200/300';
        if($price->update($this->validatePrice())){

            Session::put("success"," Successfully Updated Product !");
        }
        else{
            Session::put("danger"," Please Try again !");
        }

        return redirect()->route('product.price.index',compact('product'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {

        $price=Price::where('id',$id)->withTrashed()->first();

        if ($price->trashed()){

            if ($price->restore()){

                toast(' Price restored Succesfully', 'success');
            }
            else{
                toast(' Failed ! Please Try again Later', 'error');
            }
        } else{
            if ($price->delete()){

                $image_path =public_path('storage/'.$price->image);
                if(File::exists($image_path)) {
                    File::delete($image_path);}
                toast(' Price Deleted Succesfully', 'success');

            }
            else{
                toast(' Failed ! Please Try again Later', 'error');
            }
        }
        return redirect()->route('product.price.index',compact('product'));
    }
}
