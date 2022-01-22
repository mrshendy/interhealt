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
				<!-- row -->
				<div class="row">
                <div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
                            <form class="needs-validation was-validated" action="{{ route('provider.store')}}" method="post">
                                     {{ csrf_field() }}
									<div class="row row-sm">
										<div class="col-lg-5">
                                            <div class="form-group has-success mg-b-0">
                                                <input class="form-control" placeholder="{{ trans('provider_trans.pr_name_ar') }}" required="" type="text" name="Name_ar" id="Name_ar" >
                                                <input class="form-control mg-t-10" placeholder="{{ trans('provider_trans.pr_name_en') }}" required="" type="text"  name="Name_en" id="Name_en">
                                                <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.pr_email') }}" required="" type="email" name="email" id="email" >
                                                <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.long') }}" required="" type="text" name="long" id="long" >
                                                <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.password') }}" required="" type="text" name="password" id="password" >
                                            </div>
										</div>
										<div class="col-lg-4">
											<div class="form-group has-success mg-b-0">
                                              <input class="form-control" placeholder="{{ trans('provider_trans.pr_num1') }}" required="" type="text" name="phone1" id="phone1" >
                                              <input class="form-control mg-t-10" placeholder="{{ trans('provider_trans.pr_num2') }}"  type="text" name="phone2" id="phone2" >
                                              <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.pr_land_number') }}" type="text" name="line_number" id="line_number" >
                                              <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.lat') }}" required="" type="text" name="lat" id="lat" >
                                              <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.password_show') }}" required="" type="text" name="password_show" id="password_show" >
											</div>
										</div>
                                        <div class="col-lg-3">
                                        <div class="form-group has-success mg-b-0">
                                        <div class="mg-t-10">
                                                    <select id="id_area" name="id_area"  class="form-control select2 "  required="">
                                                        <option label="{{ trans('Area_trans.name') }}" value="0"  disabled>{{ trans('Area_trans.name') }}</option>
                                                        <option  value="1"  >{{ trans('provider_trans.private') }}</option>
                                                        <option  value="2"  >{{ trans('provider_trans.governmental') }}</option>
                                                    </select>
                                         </div>
                                        <div class="mg-b-10 mg-t-10">
                                                    <select  class="form-control select2 mg-t-10  "  required="" name="id_type">
                                                            <option label="{{ trans('user_type_trans.name') }}" value="0"> {{ trans('user_type_trans.name') }}</option>
                                                                @foreach ($user_types as $user_type)
                                                            <option value="{{ $user_type->id }}">{{ $user_type->type_name }}</option>
                                                                @endforeach
                                                    </select>
                                        </div>   
                                        <div class="mg-t-10 mg-t-10 mg-b-10">
                                                <select name="id_specialty" class="form-control select2 mg-t-10  "  required="" >
                                                        <option label="{{ trans('specialty_trans.Name') }}" value="0"> {{ trans('specialty_trans.Name') }}</option>
                                                            @foreach ($Specialtiys as $Specialtiy)
                                                        <option value="{{ $Specialtiy->id }}">{{ $Specialtiy->Name }}</option>
                                                            @endforeach
                                                </select>
                                         </div>
                                        <div class="mg-t-10 mg-t-10 mg-b-10">
                                                <select name="id_provider_category" class="form-control select2 mg-t-10  " >
                                                        <option label="{{ trans('provider_category_trans.name') }}" value="0"> {{ trans('provider_category_trans.name') }}</option>
                                                            @foreach ($provider_categorys as $provider_category)
                                                        <option value="{{ $provider_category->id }}">{{ $provider_category->Name }}</option>
                                                            @endforeach
                                                </select>
                                        </div>
                                        <div class="mg-t-10">
                                                    <select id="id_area" name="id_area"  class="form-control select2 "  required="">
                                                        <option label="{{ trans('Area_trans.name') }}" value="0"  disabled>{{ trans('Area_trans.name') }}</option>
                                                            @foreach ($Areaes as $Areae)
                                                        <option value="{{ $Areae->id }}">{{ $Areae->Name }}</option>
                                                            @endforeach
                                                    </select>
                                        </div>
                                        </div>
										</div>
                                        
                                        <div class="col-lg-9">
                                      <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.address') }}" required="" type="text" name="address" id="address" >
                                      <input class="form-control mg-t-10 mg-b-10 " placeholder="{{ trans('provider_trans.notes') }}"  type="text" name="notes" id="notes" >

									</div> 
									</div>
                                   
                                    <div class="mg-t-10">
                                                <button type="submit" class="btn btn-primary">{{ trans('provider_trans.save') }}</button>
									</div>
                             </form>
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