@extends('welcome')

@section('content')

    <body>
    <style>
        .button {
            text-align: center;
            padding-top: 20px;
            clear: both;
        }

        #hidden_div {
            display: none;
        }


    </style>


    <!-- <div class="row  border-bottom "></div> -->

    <!--   Put all the body contenet here -->


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">


                    <div class="ibox-content">

                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action=" " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> User/Admin
                                                    Information </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">


                                                    <!--  Name  -->

                                                    <div class="form-group"><label class="col-sm-4 control-label"> Full
                                                            Name</label>
                                                        <div class="col-sm-8"><input type="text"


                                                                                     class="form-control"
                                                                                     value="{{  $user->name}} "   readonly
                                                                                     required>
                                                        </div>

                                                    </div>
                                                    <!-- User Name-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            User Name</label>

                                                        <div class="col-sm-8"><input type="text"

                                                                                     class="form-control"
                                                                                     value="{{  $user->user_name}} "   readonly
                                                                                     required>
                                                        </div>
                                                    </div>
                                                    <!-- Phone  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label"> Phone</label>

                                                        <div class="col-sm-8"><input type="text"


                                                                                     class="form-control"
                                                                                     value="{{  $user->phone }}" readonly
                                                            >

                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="col-sm-6">

                                                    <!-- Admin Type-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Admin Type </label>
                                                        <div class="col-sm-8">
                                                            <select class="elect2_demo_user  form-control"
                                                                    readonly="" >

                                                                @foreach($admin_type as $admin_type)
                                                                    <option {{ $admin_type->id ==  $user->adminType->id ?'selected':""}} value="{{$admin_type->id}}">{{$admin_type->name}} </option>

                                                                @endforeach

                                                            </select>


                                                        </div>
                                                    </div>

                                                    <!-- Email-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">Email </label>

                                                        <div class="col-sm-8"><input type="email"

                                                                                     value="{{  $user->email }}"
                                                                                     class="form-control" readonly
                                                            >

                                                        </div>
                                                    </div>





                                                </div>



                                            </div>

                                        </div>
                                    </div>

                                </form>


                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>




    @endsection

    @section('extra')



@endsection

