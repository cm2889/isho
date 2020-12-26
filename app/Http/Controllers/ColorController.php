<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
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
        $colors= Color::withTrashed()->get()->sortByDesc('id');
        return view('colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color= new Color();
        return view('colors.create', compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        if($color = Color::create($this->validatecolor())) {
            toast(' Successfully Added color ! ', 'success');

        }
        else{
            toast(' Failed ! Please Try again Later', 'error');
        }

        return redirect('color');
    }
    private function validatecolor()
    {
        return request()->validate([
            'color_name' => 'required',
            'user_id' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('colors.show',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('colors.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Color $color)
    {
        $request['user_id'] = Auth::user()->id;
        if($color->update($this->validatecolor())){

            toast(' Successfully Updated color !', 'success');
        }
        else{
            toast(' Failed ! Please Try again Later', 'error');
        }

        return redirect('color');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=Color::where('id',$id)->withTrashed()->first();
        if ($color->trashed()){

            if ($color->restore()){
                toast(' Successfully Restored color !', 'success');
            }
            else{
                toast(' Failed ! Please Try again Later', 'error');
            }
        } else{
            if ($color->delete()){

                toast(' Successfully Deleted color !', 'success');
            }
            else{
                toast(' Failed ! Please Try again Later', 'error');
            }
        }
        return redirect('color');
    }
}
