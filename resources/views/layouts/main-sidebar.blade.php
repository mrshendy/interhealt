<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.jpeg')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">Premium Member</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
    <!-- start Dashbord -->
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='index') }}"><i class="las la-tachometer-alt side-menu__icon" viewBox="0 0 24 24" style="color: #5b6e88;"></i><span class="side-menu__label" style="padding-top: 15px;">{{ trans('main_trans.Dashbord') }}</span></a>
					</li>
   <!-- end Dashbord -->
   <!-- start Provider Management -->
                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="typcn typcn-group-outline side-menu__icon" viewBox="0 0 24 24" style="color: #5b6e88;"></i><span class="side-menu__label" style="padding-top: 15px;">{{ trans('main_trans.Provider_Management') }}</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="las la-desktop side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;" class="sub-side-menu__label">{{ trans('main_trans.program') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{route('provider.index') }}">{{ trans('main_trans.New_Provider') }}</a></li>
									<li><a class="sub-slide-item" href="{{route('government.index') }}">{{ trans('main_trans.list_Provider') }}</a></li>
						    </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="lab la-readme side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;"  class="sub-side-menu__label">{{ trans('main_trans.repot') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
									<li><a class="sub-slide-item" href="{{route('countries.index') }}">{{ trans('main_trans.New_Providers_Report') }}</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="las la-tools side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;"  class="sub-side-menu__label">{{ trans('main_trans.setting') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{route('User_type.index') }}">{{ trans('main_trans.typeuser') }}</a></li>
							        <li><a class="sub-slide-item" href="{{route('specialtiy.index') }}">{{ trans('main_trans.Specialty_settings') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('service_type.index') }}">{{ trans('main_trans.service_type_settings') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('provider_Category.index') }}">{{ trans('main_trans.Category_settings') }}</a></li>

					            </ul>
                            </li>



						</ul>
					</li>
   <!-- end Provider Management -->

   <!-- start Manage reservations -->
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="mdi mdi-account-convert side-menu__icon" viewBox="0 0 24 24" style="color: #5b6e88;"></i> <span class="side-menu__label" style="padding-top: 15px;">{{ trans('main_trans.reservations_Management') }}</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">

                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="las la-desktop side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;" class="sub-side-menu__label">{{ trans('main_trans.program') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{route('countries.index') }}">{{ trans('main_trans.New_Provider') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('government.index') }}">{{ trans('main_trans.list_Provider') }}</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="lab la-readme side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;"  class="sub-side-menu__label">{{ trans('main_trans.repot') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                    <li><a class="sub-slide-item" href="{{route('countries.index') }}">{{ trans('main_trans.New_Providers_Report') }}</a></li>
                                </ul>
                            </li>
                            <li class="sub-slide">
                                <a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"> <i class="las la-tools side-menu__icon" style="color: #fb8844de  !important;font-size: 17px;"></i> <span style="padding-top: 9px;"  class="sub-side-menu__label">{{ trans('main_trans.setting') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
                                <ul class="sub-slide-menu">
                                   <!-- <li><a class="sub-slide-item" href="{{route('User_type.index') }}">{{ trans('main_trans.typeuser') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('specialtiy.index') }}">{{ trans('main_trans.Specialty_settings') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('service_type.index') }}">{{ trans('main_trans.service_type_settings') }}</a></li>
-->                             </ul>
                            </li>


                        </ul>
                    </li>
   <!-- end General Settings -->
   <!-- start General Settings -->
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="bx bx-cog side-menu__icon" viewBox="0 0 24 24" style="color: #5b6e88;"></i> <span class="side-menu__label" style="padding-top: 15px;">{{ trans('main_trans.setting') }}</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">

						   <li class="sub-slide">
								<a class="  sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">{{ trans('main_trans.Regions_Settings') }}</span><i class="sub-angle fe fe-chevron-down"></i></a>
								<ul class="sub-slide-menu">
									<li><a class="sub-slide-item" href="{{route('countries.index') }}">{{ trans('main_trans.Countries') }}</a></li>
									<li><a class="sub-slide-item" href="{{route('government.index') }}">{{ trans('main_trans.Government') }}</a></li>
                                    <li><a class="sub-slide-item" href="{{route('city.index') }}">{{ trans('main_trans.city') }}</a></li>
									<li><a class="sub-slide-item" href="{{route('area.index') }}">{{ trans('main_trans.Area') }}</a></li>
								</ul>
							</li>


						</ul>
					</li>
   <!-- end General Settings -->

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
