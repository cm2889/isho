@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #3f51b5"> price Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('product.price.create',compact('product'))}}" data-toggle="modal">Add price</a>

                    </div>
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
                                    <th>Product QR Code</th>
                                    <th>Action</th>

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
                                        <td ><?php echo DNS1D::getBarcodeHTML($price->id, 'C39')  {{--{{$product->product_name}}--}} ?></td>



                                        <td class="center">

                                            <a href="{{route('product.price.edit', compact('product','price'))}} "><i
                                                        class="fa fa-edit"></i></a>
                                            @if(!$price->trashed()&&!\App\Color::where('id',$price->color_id)->withTrashed()->first()->trashed())
                                            <a href="{{route('product.price.inventory.index', compact('product','price'))}} "><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            <a>
                                                <form action="{{ route('product.price.destroy', compact('product','price')) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                            style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="{{$price->trashed()?'fa fa-undo':'fa fa-trash'}}"></i></button>
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



