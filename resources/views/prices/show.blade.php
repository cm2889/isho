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

                                <form method="POST"  class="form-horizontal"
                                      enctype="multipart/form-data">
                                    <div class="row">

                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3 class="m-t-none m-b navbar-static-top"> Edit price Information </h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top"></h3>
                                            <div class="row"> <!--First row option starts here-->
                                                <div class="col-sm-6">


                                                    <!--  Email  -->
                                                    <div class="form-group"><label class="col-sm-4 control-label"> price Name</label>

                                                        <div class="col-sm-8"><input type="text"
                                                                                     placeholder="   price Name "
                                                                                     name="price_name"
                                                                                     class="form-control"
                                                                                     value="{{ old('price_name') ?? $price->price_name }}"
                                                                                     readonly
                                                                                     required>
                                                            <div class="alert-danger" >{{$errors->first('price_name')}} </div>
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


            $(".select2_category").select2({
                placeholder: "Select Process",
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


        </script>

@endsection

