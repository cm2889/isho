@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #00aeef"> Designation  Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('designation.create')}} "
                           data-toggle="modal">Add Designation </a>
                        <a class="btn-primary pull-right btn-sm" href="{{route('importDesignation')}} "
                           data-toggle="modal" style="margin-right: 10px">Import Excel </a>


                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>



                                    <th > Designation Name</th>
                                    <th >Current Status</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($designations as $designation)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td> {{$designation->designation_name}} </td>

                                        <td>
                                            <a>
                                                <form action="{{route('designation.destroy', ['designation' => $designation]) }}"
                                                      method="POST">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="btn btn-{{$designation->status=="Active"?"success":"danger"}}">{{$designation->status}} </i>
                                                    </button>
                                                </form>
                                            </a>
                                        </td>
                                        <td class="center">

                                            <a href="{{route('designation.edit', ['designation' => $designation])}} "><i
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



