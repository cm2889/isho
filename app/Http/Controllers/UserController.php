<?php

namespace App\Http\Controllers;

use App\AdminType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users= User::all()->sortByDesc('id');
        $admin_types= AdminType::all();
        return view('user.index',compact('users','admin_types'));
    }


    public function create()
    {
        $user= new User();
        $admin_types= AdminType::all();
        return view('user.create',compact('user','admin_types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()['password']=Hash::make($request->getPassword());
        if($user = User::create($this->validateUser())) {


            toast(' User Information Stored Successfully','success');
        }
        else{
            toast(' Failed ! Please Try again Later','error');
        }

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $admin_type= AdminType::all()->sortByDesc("id");
        return view('user.show',compact('admin_type','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $admin_type= AdminType::all();
        return view('user.edit',compact('admin_type','user'));


    }


    public function update(User $user)
    {
        if ($user->update($this->validateUserupdate())) {
            toast(' User Information Edited Successfully', 'success');
        } else {
            toast(' Failed ! Please Try again Later', 'error');
        }


        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->update(['status' => $user->status == "Active" ? "Inactive" : "Active"])) {
            toast(' User Status  has been Updated ', 'success');


        } else {
            toast(' Failed ! Please Try again Later','error');

        }

        return redirect('user');
    }

    private function validateUser()
    {
        return request()->validate([

            'admin_type_id' => 'required',
            'name' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);
    }

    private function validateUserupdate()
    {
        return request()->validate([

            'admin_type_id' => 'required',
            'name' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',





        ]);
    }
}
