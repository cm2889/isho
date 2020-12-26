<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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

    public function index()
    {
        $products = Product::withTrashed()->get()->sortByDesc('id');
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        if ($product = Product::create($this->validateProduct())) {
            toast(' Product Status  has been Updated ', 'success');

        } else {
            toast(' Failed ! Please Try again Later', 'error');
        }

        return redirect('product');
    }

    private function validateProduct()
    {
        return request()->validate([
            'product_name' => 'required',
            'user_id' => 'required',
        ]);
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $request['user_id'] = Auth::user()->id;
        if ($product->update($this->validateProduct())) {
            toast(' Successfully Updated Product !', 'success');

        } else {
            toast(' Failed ! Please Try again Later', 'error');
        }

        return redirect('product');

    }


    public function destroy($id)
    {
        $product = Product::where('id', $id)->withTrashed()->first();
        if ($product->trashed()) {

            if ($product->restore()) {

                toast(' Successfully Restored Product !', 'success');
            } else {
                toast(' Failed ! Please Try again Later', 'error');
            }
        } else {
            if ($product->delete()) {

                toast(' Successfully Deleted Product !', 'success');
            } else {
                toast(' Failed ! Please Try again Later', 'error');
            }
        }
        return redirect('product');
    }
}
