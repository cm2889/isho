@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #3f51b5"> Inventory Information for <font style="color: #1b1e21">{{$product->product_name}}</font> for the Color <font style="color: #1b1e21">{{$price->color->color_name}}</font> </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('product.price.inventory.create',compact('product','price'))}}" data-toggle="modal">Update Inventory</a>
                        <a class="btn-primary pull-right btn-sm" href="{{route('importDesignation')}} "
                           data-toggle="modal" style="margin-right: 10px">Import Excel </a>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>Product Count</th>
                                    <th>Time</th>
                                    <th>Cumulative Count</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1; $count=0?>
                                @foreach($inventories as $inventory)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td style="color:{{$price->trashed()?'red':''}}"> {{$inventory->count}} </td>
                                        <td style="color:{{\App\Color::where('id',$price->color_id)->withTrashed()->first()->trashed()?'red':''}}"> {{$inventory->time}} </td>


                                        <td class="center">

                                            {{--<a href="{{route('product.price.edit', compact('product','price'))}} "><i
                                                        class="fa fa-edit"></i></a>--}}
                                            {{--<a href="{{route('product.price.inventory.index', compact('product','price'))}} "><i
                                                        class="fa fa-eye"></i></a>--}}

                                            {{$count+=$inventory->count}}

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



