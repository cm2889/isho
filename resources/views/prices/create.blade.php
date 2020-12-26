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
                                <form method="POST" action="{{route('product.price.store',compact('product'))}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf

                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"> Create New price </h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label class="col-sm-4 control-label">Price </label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder="price"
                                                                                     name="price"
                                                                                     value="{{ old('price_name') ?? $price->price_name }}"
                                                                                     class="form-control" required>
                                                        </div>
                                                        <div class="alert-danger" >{{$errors->first('price_name')}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group"><label class="col-sm-4 control-label">Color </label>

                                                        <div class="col-sm-8">
                                                            <select class="select_search form-control"
                                                                    name="color_id" required>
                                                                <option></option>
                                                                @foreach($colors as $color)
                                                                    <option value="{{$color->id}}" {{ $color->id == old('color_id') ?'selected':""}} >{{$color->color_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="alert-danger" >{{$errors->first('price_name')}}</div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Relevant Documents </label>
                                                        <div class="col-sm-8">

                                                            <div class="fileinput fileinput-new input-group"
                                                                 data-provides="fileinput">
                                                                <div class="form-control" data-trigger="fileinput"><i
                                                                            class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span
                                                                            class="fileinput-filename"></span></div>
                                                                <span
                                                                        class="input-group-addon btn btn-default btn-file"><span
                                                                            class="fileinput-new">Select file</span><span
                                                                            class="fileinput-exists">Change</span><input
                                                                            type="file"
                                                                            id="image_location"
                                                                            name="image"></span>
                                                                <a href="#"
                                                                   class="input-group-addon btn btn-default fileinput-exists"
                                                                   data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                            <div class="alert-danger" >{{$errors->first('image')}}</div>
                                                        </div>
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





        <script>

            $(".select_search").select2({
                placeholder: "Select Color",
                allowClear: true,

            });



        </script>


@endsection

