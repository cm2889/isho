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
                                <form method="POST" action="{{route('storeDesignation')}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-10">
                                                    <!-- Organization Bank Statement   -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Import Designation Information (Excel) </label>
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
                                                                            name="file"></span>
                                                                <a href="#"
                                                                   class="input-group-addon btn btn-default fileinput-exists"
                                                                   data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                            <div class="alert-danger" > </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">

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

