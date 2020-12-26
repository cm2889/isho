<?php

namespace App\Http\Controllers;


use App\Inventory;
use App\Price;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InventoryController extends Controller
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

    public function index(Product $product, Price $price)
    {
        $inventories= Inventory::withTrashed()->where('price_id',$price->id)->get();
        return view('inventories.index',compact('price','product','inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product, Price $price)
    {
        $inventory= new Inventory();
        return view('inventories.create', compact('product','price','inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product, Price $price)
    {
        $request['user_id'] = Auth::user()->id;
        $request['price_id'] = $price->id;
        if($inventory = Inventory::create($this->validateInventory())) {

            toast(' Successfully Added Inventory  Product !', 'success');
        }
        else{
            toast(' Failed ! Please Try again Later', 'error');
        }

        return redirect()->route('product.price.inventory.index',compact('product','price'));
    }
    //Valideed Record
    private function validateInventory()
    {
        return request()->validate([
            'price_id' => 'required',
            'user_id' => 'required',
            'count'=>'required',
            'time'=>'required',
        ]);
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
    public function update(Product $product, Price $price, Inventory $inventory, Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request['price_id'] = $price->id;
        if($price->update($this->validateInventory())){

            toast(' Successfully Updated Product ! !', 'success');

        }
        else{
            toast(' Failed ! Please Try again Later', 'error');
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
//        dd($product);
        $price=Price::where('id',$id)->withTrashed()->first();
        if ($price->trashed()){

            if ($price->restore()){
                toast(' Successfully Restored Price !', 'success');

            }
            else{
                Session::put("danger"," Please Try again !");
            }
        } else{
            if ($price->delete()){

                toast(' Successfully Delete the product Price !', 'success');
            }
            else{
                toast(' Failed ! Please Try again Later', 'error');
            }
        }
        return redirect()->route('product.price.index',compact('product'));
    }
}
