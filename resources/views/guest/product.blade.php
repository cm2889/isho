@extends('guest')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">


                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>Product Name</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($products as $product)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td style="color:{{$product->trashed()?'red':''}}"> {{$product->product_name}} </td>


                                        <td class="center">



                                            <a href="{{route('guest.color',['product'=>$product])}} "><i
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



