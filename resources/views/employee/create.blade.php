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
                                <form method="POST" action="{{route('employee.store')}} " class="form-horizontal"
                                      enctype="multipart/form-data">

                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Employee Information
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">


                                                    <!--  Name  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label">Full Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Enter Full Name "
                                                                                     name="name"
                                                                                     class="form-control"
                                                                                     value="{{ old('name') ?? $employee->name }}"
                                                                                     >
                                                            <div class="alert-danger" >{{$errors->first('name')}} </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><label class="col-sm-4 control-label"> Employee ID</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Enter Employee ID   "
                                                                                     name="employee_id"
                                                                                     class="form-control"
                                                                                     value="{{ old('employee_id') ?? $employee->employee_id }}"
                                                            >
                                                            <div class="alert-danger" >{{$errors->first('employee_id')}} </div>
                                                        </div>
                                                    </div>

                                                    <!-- Phone  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label"> Phone</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder=" Enter Phone Number   "
                                                                                     name="phone"
                                                                                     class="form-control"
                                                                                     value="{{ old('phone') ?? $employee->phone }}"
                                                                                     >
                                                            <div class="alert-danger" >{{$errors->first('phone')}} </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-sm-6">

                                                    <!-- Process Type-->

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                           Select process </label>
                                                        <div class="col-sm-8">
                                                            <select class="elect2_demo_user  form-control"
                                                                    name="process_id" >
                                                                <option></option>
                                                                @foreach($processes as $process)

                                                                    <option {{ $process->id == old('process_id') ?'selected':""}} value="{{$process->id}}" >{{$process->pr_name}}</option>

                                                                @endforeach

                                                            </select>

                                                            <div class="alert-danger" >{{$errors->first('process_id')}} </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group"><label class="col-sm-4 control-label">
                                                            Select Designation </label>
                                                        <div class="col-sm-8">
                                                            <select class="select2_demo_designation  form-control"
                                                                    name="designation_id" >
                                                                <option></option>
                                                                @foreach($designation as $designation)

                                                                    <option {{ $designation->id == old('designation_id') ?'selected':""}} value="{{$designation->id}}">{{$designation->designation_name}}</option>

                                                                @endforeach

                                                            </select>

                                                            <div class="alert-danger" >{{$errors->first('designation_id')}} </div>
                                                        </div>
                                                    </div>

                                                   








                                                </div>
                                                <hr/>




                                                <div class="button">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="button text-center">
                                                                <div class="form-group">
                                                                    <p><strong>Note:</strong> <font color="red">All
                                                                            Fields
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
        <!-- Date picker -->

        <script type="text/javascript">


            $(".elect2_demo_user ").select2({
                placeholder: "Select Admin Type",
                allowClear: false,

            });
            $(".select2_demo_designation ").select2({
                placeholder: "Select Designation ",
                allowClear: false,

            });


        </script>



@endsection

