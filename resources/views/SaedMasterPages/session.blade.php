@extends('SaedMasterLayouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('obs.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Setting</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->





			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
				<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							@include('SaedMasterInc.sider')
						</div>
						<!-- / Profile Sidebar -->
						
<div class="col-md-7 col-lg-8 col-xl-9">
						
<div class="card">
	<div class="card-header">
		<h4 class="card-title float-left">Session</h4>
		<button class="btn btn-success btn-sm float-right" id="uploadsession_btn">Upload Session</button>
	</div>
	<div class="card-body">
		<div>
			<p>Hello {{auth()->guard('saedmaster')->user()->name}},<br> <span>Session must be created for every stream in order for both prospective and serving corps members to know about you and you office.</span> </p>
			<p><b>Purpose of it</b><br/> <span>1. Online Lecture</span><br /> <span>2. Discussing Forum</span><br /> <span>3. E-Book (etc)</span></p>

			<p>Every session created will be activated with token of #1,000 <br /> <span>Which will be paid to nysc management scheme, <b>none activated session will not be seen or accessable to corps members</b></span></p>
		</div>




<div class="row row-grid">
								@if(count($sessions) > 0)
								@foreach($sessions as $session)
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="{{ asset('assets/img/saedimage/'.auth()->guard('saedmaster')->user()->image) }}" class="booking-doc-img">
														<img src="{{ asset('assets/img/saedimage/'.auth()->guard('saedmaster')->user()->image) }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="patient-profile.html">{{auth()->guard('saedmaster')->user()->saed_title}}</a></h3>
														
														<div class="patient-details">
															<h5><b>Session ID :</b> {{$session->session_id}}</h5>
															<h5 class="mb-0"><i class="fas fa-home"></i> {{$session->session_year}}, Batch: {{$session->session_batch}}, Stream: {{$session->session_stream}} </h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Status <span>{{$session->session_status}}</span></li>
													<li>Members <span>{{$session->member}}</span></li>
													<li><a href="saedsession/{{auth()->guard('saedmaster')->user()->saed_title}}/{{$session->saed_session_id}}" class="btn btn-success btn-sm">Enter</a> <span><i class="fa fa-trash" style="color: red;" data-id="{{$session->saed_session_id}}" id="delete_session_btn"></i></span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								@endforeach
								@else

								<center><h6>NO RECORD FOUND</h6></center>
								@endif
							
								
						
								
							</div>






		
		
	</div>
	</div>
						

							
						</div>

					</div>

				</div>

			</div>		
			<!-- /Page Content -->

@include('SaedMasterInc.uploadsession')
@include('SaedMasterInc.changepassword')
@include('SaedMasterInc.changeimage')
@endsection
