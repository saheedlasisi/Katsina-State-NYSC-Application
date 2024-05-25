@extends('ObsLayouts.app')
@section('content')

<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('obs.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Saed</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Saed Masters</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->






<br>
<button class="btn btn-primary btn-sm float-right" id="saed_registration_btn">Register Saed Master</button><br>
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->						@include('ObsInc.sider')
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="row row-grid">
								@if(count($saeds) > 0)
								
								@foreach($saeds as $saed)
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="{{asset('assets/img/saedimage/'.$saed->image) }}" class="booking-doc-img">
														<img src="{{asset('assets/img/saedimage/'.$saed->image) }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>{{$saed->name}}</h3>
														<div class="patient-details">
															<h5><b>Saed ID :</b> {{$saed->saed_id}}</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{$saed->lga}}, {{$saed->state_of_origin}} </h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone: <span>{{$saed->phone_number}}</span></li>
													<li>Email: <span>{{$saed->email}}</span></li>
													<li>Action: <span><i class="fa fa-trash" style="color: red;" data-id="{{$saed->id}}" id="delete_saed_btn"></i></span></li>
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
			<!-- /Page Content -->





@include('ObsInc.changepassword')
@include('ObsInc.seadregister')
@endsection			