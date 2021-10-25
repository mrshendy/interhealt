@extends('layouts.master')
@section('css')

    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">


    <!--- Internal Sweet-Alert css-->
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">


@section('title')
{{ trans('provider_trans.page_name') }}
@stop

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('provider_trans.page_name_main') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('provider_trans.page_name') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">

		<!--/div-->

        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation was-validated">
                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group has-success ">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_name_ar') }}" required="" type="text" name="pr_name_ar" id="pr_name_ar" >
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_name_en') }}" required="" type="text"  name="pr_name_en" id="pr_name_en">
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_email') }}" required="" type="email" name="pr_email" id="pr_email" >
                                </div>
                                <div class="form-group has-success">
                                <select name="Id_country" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log($(this).val())" >
                                        <!--placeholder-->
                                        <option value="" selected disabled>{{ trans('Government_trans.Country') }}</option>
                                        @foreach ($Countries as $Country)
                                        <option value="{{ $Country->id }}">{{ $Country->Name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group has-success">
                                <select id="id_city" name="id_city" class="form-control">
                                     <option value="" selected disabled>{{ trans('Area_trans.city') }}</option>

                                </select>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_num1') }}" required="" type="text" name="pr_num1" id="pr_num1" >
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_num2') }}" required="" type="text" name="pr_name_ar" id="pr_num2" >
                                </div>
                                <div class="form-group has-success">
                                    <input class="form-control" placeholder="{{ trans('provider_trans.pr_num1') }}" required="" type="text" name="pr_name_ar" id="pr_num1" >
                                </div>
                              
                                <div class="form-group has-success">
                                <select id="Id_Governmentes" name="Id_Governmentes" class="form-control" onselect="get_city($(this).val())"
                                     onchange="get_city($(this).val())"  onvolumechange="get_city($(this).val())">
                                     <option value="" selected disabled>{{ trans('Area_trans.Governmentes') }}</option>
                                 </select>
                                </div>
                                <div class="form-group has-success">
                                 <select id="Id_Governmentes" name="Id_Governmentes" class="form-control" onselect="get_Area($(this).val())"
                                     onchange="get_Area($(this).val())"  onvolumechange="get_Area($(this).val())">
                                    <option value="" selected disabled>{{ trans('Area_trans.Area') }}</option>

                                  </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>



        <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    @if(App::getlocale()=='ar')
        <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTablesar.js') }}"></script>
    @endif

    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>


    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <!--Internal  Datepicker js -->

    <!--Internal  Sweet-Alert js-->
    <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>
    <!-- Sweet-alert js  -->
    <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/sweet-alert.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="Id_country"]').on('change', function() {
                var Id_country = $(this).val();
                if (Id_country) {
                    $.ajax({
                        url: "{{ URL::to('city') }}/" + Id_country,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="Id_Governmentes"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="Id_Governmentes"]').append('<option value="' +
                                key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });


    </script>
    <script>

function get_city(Id_Governmentes) {
    var Id_Governmentes =Id_Governmentes;
                if (Id_Governmentes) {
                    $.ajax({
                        url: "{{ URL::to('provider') }}/" + Id_Governmentes,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_city"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="id_city"]').append('<option value="' +
                                key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
}

function get_area(Id_city) {
    var Id_city =Id_city;
                if (Id_city) {
                    $.ajax({
                        url: "{{ URL::to('provider') }}/" + Id_city,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="id_area"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="id_area"]').append('<option value="' +
                                key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
}

    </script>
@endsection
