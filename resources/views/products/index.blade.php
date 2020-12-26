@extends('welcome')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5 style="color: #3f51b5"> Product Information </h5>
                        <a class="btn-primary pull-right btn-sm" href="{{route('product.create')}}" data-toggle="modal">Add Product</a>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>

                                    <th>Sl.</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter=1;?>
                                @foreach($products as $product)
                                    <tr>
                                        <td> {{$counter}} </td>
                                        <td style="color:{{$product->trashed()?'red':''}}"> {{$product->product_name}} </td>
                                        <td ><?php echo DNS1D::getBarcodeHTML($product->id, 'C39')   ?></td>



                                        <td class="center">

                                            <a href="{{route('product.edit', ['product' => $product])}} "><i
                                                        class="fa fa-edit"></i></a>
                                            @if(!$product->trashed())
                                            <a href="{{route('product.price.index',['product'=>$product])}} "><i
                                                        class="fa fa-eye"></i></a>
                                            @endif
                                            <a>
                                                <form action="{{ route('product.destroy', ['product' => $product]) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button
                                                            style="background: none!important;border: none;padding: 0!important;">
                                                        <i class="{{$product->trashed()?'fa fa-undo':'fa fa-trash'}}"></i></button>
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



