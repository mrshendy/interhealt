@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--- Internal Sweet-Alert css-->
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>


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
                {{ trans('provider_trans.page_name_provider_attachments') }}</span>
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
				<!-- row -->
				<div class="row">
                <div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
                            <form enctype="multipart/form-data" class="needs-validation was-validated" action="{{ route('provider_attachments.store')}}" method="post">
                                     {{ csrf_field() }}
				
                                <div class="row">
                                <div class="col-sm-12 col-md-4">
										<input type="file"  name="file_provider"  class="dropify" data-height="200" />
                                        <input type="text" class="form-control" id="Name_file" name="Name_file" placeholder="{{ trans('provider_trans.name_file') }}">
                                        <p class="mg-b-10">{{ trans('provider_trans.Choose_file_type') }}</p>
                                            <select name="id_type_file" class="form-control SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                                <!--placeholder-->
                                                <option title="{{ trans('provider_trans.copy_of_the_contract') }}"  value="1">{{ trans('provider_trans.copy_of_the_contract') }}</option>
                                                <option value="2">{{ trans('provider_trans.appendix_of_the_contract') }}</option>
                                                <option value="3">{{ trans('provider_trans.data') }}</option>
                                                <option value="4">{{ trans('provider_trans.ather') }}</option>
                                            </select>
                                       
                                        <div class="mg-t-10">
                                                <button type="submit" class="btn btn-primary">{{ trans('provider_trans.add') }}</button>
                                                <button type="submit" class="btn btn-success">{{ trans('provider_trans.save') }}</button>

									   </div>
									</div>
                                     </form>
                                   	<!--div-->
                                    <div class="col-xl-8">
                                        <div class="card">
                                            <div class="card-header pb-0">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="card-title mg-b-0"></h4>
                                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                </div>
                                                <p class="tx-12 tx-gray-500 mb-2"> </p>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped mg-b-0 text-md-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('provider_trans.id_table') }}</th>
                                                                <th>{{ trans('provider_trans.name_table') }}</th>
                                                                <th>{{ trans('provider_trans.type_table') }}</th>
                                                                <th><i class="la la-cog" style="font-size: large;"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          <?php $i=0; ?>
                                                            @foreach ($provider_attachments as $provider_attachment)

                                                            <?php $i++; ?>
                                                            <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$provider_attachment->Name_file}}</td>
                                                            <td>{{$provider_attachment->id_type_file}}</td>
                                                            <td>
                                                                <div class="btn-icon-list">
                                                                    <a class="btn btn-info btn-icon"
                                                                            data-toggle="modal"
                                                                            data-target="#edit{{$provider_attachment->id}}"
                                                                            title="{{ trans('provider_category_trans.titel_updeta') }}">
                                                                        <i class="las la-pen"></i>
                                                                        </a>
                                                                    <a class="btn btn-danger btn-icon"
                                                                            data-toggle="modal"
                                                                            data-target="#delete{{$provider_attachment->id}}"
                                                                            title="{{ trans('provider_category_trans.delete') }}">
                                                                        <i  class="las la-trash"></i>
                                                                    </a>
                                                                </div>



                                                            </td>
                                                        </tr>
                                                       
                                                        <!-- edit -->
                                                        <div class="modal fade" id="edit{{$provider_attachment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">{{ trans('provider_trans.titel_updeta') }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('provider_attachments.update','test')}}" method="post" >
                                                                            {{ method_field('patch') }}
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">{{  trans('provider_trans.name_file') }}</label>
                                                                                <input type="text" class="form-control" id="name_file" name="name_file"
                                                                                    value="{{$provider_attachment->Name_file}}">
                                                                                <input  class="form-control" id="id" name="id"
                                                                                        value="{{$provider_attachment->id}}" type="hidden">
                                                                            </div>
                                                                           
                                                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ trans('provider_trans.Choose_file_type') }}</label>
                                                                            <select name="id_type_file" class="form-control SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                                                                <!--placeholder-->
                                                                                <option title="{{ trans('provider_trans.copy_of_the_contract') }}"  value="1">{{ trans('provider_trans.copy_of_the_contract') }}</option>
                                                                                <option value="2">{{ trans('provider_trans.appendix_of_the_contract') }}</option>
                                                                                <option value="3">{{ trans('provider_trans.data') }}</option>
                                                                                <option value="4">{{ trans('provider_trans.ather') }}</option>
                                                                            </select>
                                                                       </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary">{{ trans('provider_trans.save') }}</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('provider_trans.cancel') }}</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- delete -->
                                                        <div class="modal" id="delete{{$provider_attachment->id}}">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">{{ trans('provider_trans.titel_delete') }}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                                                                        type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form action="{{ route('provider_attachments.destroy','test')}}" method="post">
                                                                        {{ method_field('delete') }}
                                                                        {{ csrf_field() }}
                                                                        <div class="modal-body">
                                                                            <p>{{ trans('provider_trans.massagedelete') }}</p><br>
                                                                            <input  class="form-control" id="id" name="id"
                                                                                    value="{{$provider_attachment->id}}" type="hidden">
                                                                            <input class="form-control" name="Name" id="Name" type="text" readonly  value="{{$provider_attachment->Name_file}}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('provider_trans.cancel') }}</button>
                                                                            <button type="submit" class="btn btn-danger">{{ trans('provider_trans.delete') }}</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div><!-- bd -->
                                            </div><!-- bd -->
                                        </div><!-- bd -->
                                    </div>
					<!--/div-->
                                </div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>


@endsection
@endsection