@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #00aeef"> Process   Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('process.create')}} "
                           data-toggle="modal">Add Process </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th >Name</th>
                                    <th >Current Status</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($processes as $process)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td> {{$process->pr_name}} </td>

                                        <td>
                                            <a>
                                                <form action="{{route('process.destroy', ['process' => $process]) }}"
                                                      method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="btn btn-{{$process->status=="Active"?"success":"danger"}}">{{$process->status}} </i>
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                        <td class="center">

                                            <a href="{{route('process.edit', ['process' => $process])}} "><i
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



