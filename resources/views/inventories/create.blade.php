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
                                <form method="POST" action="{{route('product.price.inventory.store',compact('product','price'))}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf

                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"> Create New price </h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label class="col-sm-4 control-label">Count </label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder="count"
                                                                                     name="count"
                                                                                     value="{{ old('price_name') ?? $inventory->count }}"
                                                                                     class="form-control" required>
                                                        </div>
                                                        <div class="alert-danger" >{{$errors->first('price_name')}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label class="col-sm-4 control-label">Time </label>

                                                        <div class="col-sm-8">
                                                            <input type="text"
                                                                   value="{{now()}}"
                                                                   name="time"
{{--                                                                   value="{{ old('time') ?? $inventory->time }}"--}}
                                                                   class="form-control" required>
                                                        </div>
                                                        <div class="alert-danger" >{{$errors->first('price_name')}}</div>
                                                    </div>

                                                </div>


                                            </div>


                                        </div>





                                        <div class="button">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="button text-center">
                                                            <div class="form-group">
                                                                <p><strong>Note:</strong> <font color="red">All Fields
                                                                        must be filled</font></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="button text-center">
                                                            <div class="form-group">
                                                                <button id="add-user" class="btn btn-primary">Submit
                                                                </button>
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

