@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #F79517"> Admin/User Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('user.create')}} "
                           data-toggle="modal">Add User  </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th > Full Name</th>
                                    <th > User Type</th>
                                    <th > Contact Number</th>
                                    <th > Email</th>
                                    <th >Status</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($users as $user)
                                    <tr>

                                        <td> {{$counter}} </td>

                                        <td> {{$user->name}} </td>
                                        <td> {{$user->adminType->name}} </td>
                                        <td> {{$user->phone}} </td>
                                        <td> {{$user->email}} </td>
                                        <td>
                                            <form action="{{route('user.destroy', ['user' => $user]) }}"
                                                  method="POST">
                                                @method("DELETE")

                                                @csrf
                                                <button style="background: none!important;border: none;padding: 0!important;">
                                                    <i class="btn btn-{{$user->status=="Active"?"success":"danger"}}">{{$user->status}} </i>
                                                </button>
                                            </form>


                                        </td>

                                        <td class="center">

                                            <a href="{{route('user.edit', ['user' => $user])}} "><i
                                                        class="fa fa-edit"></i></a>
                                            <a href="{{route('user.show', ['user' => $user])}} "><i
                                                        class="fa fa-eye"></i></a>


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



