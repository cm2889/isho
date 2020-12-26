@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #F79517"> Employee Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('employee.create')}} "
                           data-toggle="modal">Add Employee  </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th > Full Name</th>
                                    <th > Employee ID </th>

                                    <th > Contact Number</th>
                                    <th > Designation</th>
                                    <th > Process</th>
                                    <th >Status</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td> {{$employee->name}} </td>
                                        <td> {{$employee->employee_id}} </td>
                                        <td> {{$employee->phone}} </td>

                                        <td> {{$employee->designation->designation_name}} </td>
                                        <td> {{$employee->process->pr_name}} </td>
                                        <td>
                                            <a>
                                                <form action="{{route('employee.destroy', ['employee' => $employee]) }}"
                                                      method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="btn btn-{{$employee->status=="Active"?"success":"danger"}}">{{$employee->status}} </i>
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                        <td class="center">

                                            <a href="{{route('employee.edit', ['employee' => $employee])}} "><i
                                                        class="fa fa-edit"></i></a>



                                        </td>




                                    </tr>


                                    <?php $counter+=1;?>
                                @endforeach


                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row  border-bottom "></div> -->

    <!--   Put all the body contenet here -->





@endsection

@section('extra')




@endsection



