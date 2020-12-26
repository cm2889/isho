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
                                    <th>Color Name</th>

                                    <th>Price</th>
                                    <th>Image</th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($prices as $price)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td style="color:{{$price->trashed()?'red':''}}"> {{$product->product_name}} </td>
                                        <td style="color:{{\App\Color::where('id',$price->color_id)->withTrashed()->first()->trashed()?'red':''}}"> {{\App\Color::where('id',$price->color_id)->withTrashed()->first()['color_name']}} </td>
                                        <td > {{$price->price}} </td>
                                          <td > <img width="100px" height="80px" src="{{asset('storage/'.$price->image)}}" /> </td>







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



