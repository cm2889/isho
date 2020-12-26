@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #F79517"> Admin Type  Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('admin_type.create')}} "
                           data-toggle="modal">Add Admin Type </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th >Name</th>
                                    <th >Status</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($admin_types as $admin_type)
                                    <tr>

                                        <td> {{$counter}} </td>

                                        <td> {{$admin_type->name}} </td>
                                        <td>
                                            <form action="{{route('admin_type.destroy', ['admin_type' => $admin_type]) }}"
                                                  method="POST">
                                                @method("DELETE")

                                                @csrf
                                                <button style="background: none!important;border: none;padding: 0!important;">
                                                    <i class="btn btn-{{$admin_type->status=="Active"?"success":"danger"}}">{{$admin_type->status}} </i>
                                                </button>
                                            </form>


                                        </td>

                                        <td class="center">

                                            <a href="{{route('admin_type.edit', ['admin_type' => $admin_type])}} "><i
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



