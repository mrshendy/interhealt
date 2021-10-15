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
{{ trans('provider_category_trans.page_name') }}
@stop

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('provider_category_trans.page_name_main') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{ trans('provider_category_trans.page_name') }}</span>
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


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                           data-toggle="modal" href="#modaldemo8">{{ trans('provider_category_trans.add') }}</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow: visible;">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0"style="width: 5%;max-width: 5px; !important">#</th>
                                <th class="border-bottom-0" style="width: 35%;max-width: 100px;!important">{{ trans('provider_category_trans.tabel_name') }}</th>
                                <th class="border-bottom-0" style="width: 35%;max-width: 100px;!important">{{ trans('provider_category_trans.teble_user_type') }}</th>
                                <th class="border-bottom-0" style="width: 35%;max-width: 120px;!important">{{ trans('provider_category_trans.tabel_note') }}</th>
                                <th class="border-bottom-0" style="width: 5%;max-width: 50px;!important">{{ trans('provider_category_trans.tabel_action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach ($provider_categorys as $provider_category)

                                <?php $i++; ?>

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$provider_category->Name}}</td>
                                    <td>{{$provider_category->user_types->type_name }}</td>
                                    <td>{{$provider_category->notes}}</td>
                                    <td>
                                        <div class="btn-icon-list">
                                            <button class="btn btn-info btn-icon"
                                                    data-toggle="modal"
                                                    data-target="#edit{{$provider_category->id}}"
                                                    title="{{ trans('provider_category_trans.titel_updeta') }}">
                                                <i class="las la-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn-icon"
                                                    data-toggle="modal"
                                                    data-target="#delete{{$provider_category->id}}"
                                                    title="{{ trans('provider_category_trans.delete') }}">
                                                <i  class="las la-trash"></i>
                                            </button>
                                        </div>



                                    </td>
                                </tr>

                                <!-- edit -->
                                <div class="modal fade" id="edit{{$provider_category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ trans('provider_category_trans.titel_updeta') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('provider_Category.update','test')}}" method="post" >
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ trans('provider_category_trans.name_ar') }}</label>
                                                        <input type="text" class="form-control" id="Name_ar" name="Name_ar"
                                                               value="{{$provider_category->getTranslation('Name','ar')}}">
                                                        <input  class="form-control" id="id" name="id"
                                                                value="{{$provider_category->id}}" type="hidden">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">{{ trans('provider_category_trans.name_en') }}</label>
                                                        <input type="text" class="form-control" id="Name_en" name="Name_en"
                                                               value="{{$provider_category->getTranslation('Name','en')}}">
                                                    </div>
                                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ trans('provider_category_trans.user_type') }}</label>
                                                    <select name="Id_user_type" id="Id_user_type" class="form-control" required>
                                                        <option value="" selected disabled>{{ trans('provider_category_trans.user_type') }}</option>
                                                        @foreach ($user_types as $user_type)
                                                            <option value="{{ $user_type->id }}" <?php if($user_type->id==$provider_category->Id_user_type){echo 'selected="true"';}?> >{{ $user_type->type_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">{{ trans('provider_category_trans.note') }}</label>
                                                        <textarea class="form-control" id="notes" name="notes" rows="3">{{$provider_category->notes}}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">{{ trans('provider_category_trans.save') }}</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('provider_category_trans.cancel') }}</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete -->
                                <div class="modal" id="delete{{$provider_category->id}}">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-content-demo">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ trans('provider_category_trans.titel_delete') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                                                type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('provider_Category.destroy','test')}}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <p>{{ trans('provider_category_trans.massagedelete') }}</p><br>
                                                    <input  class="form-control" id="id" name="id"
                                                            value="{{$provider_category->id}}" type="hidden">
                                                    <input class="form-control" name="Name" id="Name" type="text" readonly  value="{{$provider_category->Name}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('provider_category_trans.cancel') }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ trans('provider_category_trans.delete') }}</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ trans('provider_category_trans.add') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                               type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('provider_Category.store')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('provider_category_trans.name_ar') }}</label>
                                <input type="text" class="form-control" id="Name_ar" name="Name_ar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ trans('provider_category_trans.name_en') }}</label>
                                <input type="text" class="form-control" id="Name_en" name="Name_en">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ trans('provider_category_trans.user_type') }}</label>
                            <select name="Id_user_type" id="Id_user_type" class="form-control" required>
                                <option value="" selected disabled>{{ trans('provider_category_trans.user_type') }}</option>
                                @foreach ($user_types as $user_type)
                                    <option value="{{ $user_type->id }}">{{ $user_type->type_name }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('provider_category_trans.note') }}</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{ trans('provider_category_trans.save') }}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('provider_category_trans.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Basic modal -->


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

@endsection
