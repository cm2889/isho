@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #3f51b5"> color Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('color.create')}}" data-toggle="modal">Add color</a>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>color Name</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($colors as $color)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td style="color:{{$color->trashed()?'red':''}}"> {{$color->color_name}} </td>


                                        <td class="center">

                                            <a href="{{route('color.edit', ['color' => $color])}} "><i
                                                        class="fa fa-edit"></i></a>
                                            @if(!$color->trashed())
                                            <a href="{{route('color.show', ['color' => $color])}} "><i
                                                        class="fa fa-eye"></i></a>
                                            @endif

                                            <a>
                                                <form action="{{ route('color.destroy', ['color' => $color]) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                            style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="{{$color->trashed()?'fa fa-undo':'fa fa-trash'}}"></i></button>
                                                </form>
                                            </a>



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



