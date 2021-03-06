@extends('welcome')

@section('content')

    <body>
    <style>
        .button {
            text-align: center;
            padding-top: 20px;
            clear: both;
        }
        #hidden_div {
            display: none;
        }


    </style>


    <!-- <div class="row  border-bottom "></div> -->

    <!--   Put all the body contenet here -->


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">

                <div class="ibox float-e-margins">


                    <div class="ibox-content">

                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" action="{{route('product.store')}} " class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf

                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"> Create New Product </h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-10">
                                                    <div class="form-group"><label class="col-sm-4 control-label">Product Name </label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder="Product Name"
                                                                                     name="product_name"
                                                                                     value="{{ old('product_name') ?? $product->product_name }}"
                                                                                     class="form-control" required>
                                                        </div>
                                                        <div class="alert-danger" >{{$errors->first('product_name')}}</div>
                                                    </div>




                                                </div>
                                                <div class="col-sm-2">







                                                </div>


                                            </div>


                                        </div>





                                        <div class="button">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="button text-center">
                                                            <div class="form-group">
                                                                <p><strong>Note:</strong> <font color="red">All Fields
                                                                        must be filled</font></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="button text-center">
                                                            <div class="form-group">
                                                                <button id="add-user" class="btn btn-primary">Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </form>
                                    </div>

                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </div>



    @endsection

    @section('extra')
        <!-- Date picker -->
        <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
        <!-- Clock picker -->
        <script src="js/plugins/clockpicker/clockpicker.js"></script>


        <script src="js/plugins/dataTables/datatables.min.js"></script>
        <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <script src="js/plugins/select2/select2.full.min.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>
        <script type="text/javascript">


            $(".select2_demo_3").select2({
                placeholder: "Select Account Type",
                allowClear: true,

            });
            $(".select2_trans").select2({
                placeholder: "Select Transaction Type",
                allowClear: true,

            });

        </script>
        <script>
            $(document).ready(function () {
                $('.clockpicker').clockpicker();


                $('.dataTables-example').DataTable({
                    pageLength: 25,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        {extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {
                            extend: 'print',
                            customize: function (win) {
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });

                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });


            });
            function showDiv(divId, element)
            {
                document.getElementById(divId).style.display = element.value === "Cheque" ? 'block' : 'none';
            }


        </script>


@endsection

