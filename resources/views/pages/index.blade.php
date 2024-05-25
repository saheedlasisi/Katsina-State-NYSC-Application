@include('inc.lecture')
@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



<?php // Start function
function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "............";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}?>



			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					@include('inc.message')


		@if(count($shop_notify) > 0)

		@foreach($shop_notify as $noty)

<div class="alert alert-danger">You have ({{$noty->total_notify}}) Order(s) Notification on  <a href="/myshop/{{$noty->shop_name}}/{{$noty->shop_id}}" class="btn btn-primary btn-sm">{{$noty->shop_name}}</a> </div>
		@endforeach
		
		@else

		@endif	











	@if(count($order) > 0)	
	<div class="alert alert-danger">Order(s) Notification ({{count($order)}}) <a href="/myprofile/{{auth()->user()->name}}/{{auth()->user()->id}}" class="btn btn-primary btn-sm">view</a> </div>
	@else

	@endif			

@if(count($request) == 1) <div class="alert alert-danger">You have {{count($request)}} Friend Request <a href="/corpsmembers" class="btn btn-primary btn-sm">view</a></div>  @elseif(count($request) > 1) <div class="alert alert-danger">You have {{count($request)}} Friend Requests <a href="/corpsmembers" class="btn btn-primary btn-sm">view</a> </div> @else  @endif

					<div class="row">
						
						<!-- Profile Sidebar -->
						@include('inc.dashnav')
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Information</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Lecture</a>
											</li>
										
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
	<div id="pat_appointments" class="tab-pane fade show active">

		
		<div class="card card-table mb-0">
			
			@if(count($todayinfos) > 0) 
			<div class="card-body">


				<!-- Education Details -->
	<div class="widget education-widget">
		<h4 class="widget-title">Today's</h4>
		<div class="experience-box">
			<ul class="experience-list">
				@foreach($todayinfos as $todayinfo)
				<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
			<div class="timeline-content">
				<a href="#/" class="name">{{$todayinfo->i_title}}</a>
				<div>signed by: {{strtoupper($todayinfo->i_signed)}}</div>
				<span class="time">{{date('d-M-Y (h:i A)', strtotime($todayinfo->created_at))}} </span>
				<a href="javascript:void(0);" class="btn btn-primary btn-sm" id="view_information" data-id="{{$todayinfo->i_id}}" data-title="{{$todayinfo->i_title}}" data-from="{{$todayinfo->i_from}}" data-signed="{{$todayinfo->i_signed}}" data-info="{{$todayinfo->i_info}}" data-date="{{$todayinfo->created_at}}">View</a>
			</div>
		</div>
	</li>
	@endforeach
				</ul>
			</div>
		</div>
		<!-- /Education Details -->
									
	</div>
	@else

<center><h6>NONE RECORD FOUND</h6></center>

@endif
</div>

<br />
<br />
<div class="card card-table mb-0">
@if(count($infos) > 0)
<div class="card-body">


	<!-- Education Details -->
	<div class="widget education-widget">
		<h4 class="widget-title">Previous</h4>
		<div class="experience-box">
			<ul class="experience-list">
				@foreach($infos as $info)
				<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
			<div class="timeline-content">
				<a href="#/" class="name">{{$info->i_title}}</a>
				<div>signed by: {{strtoupper($info->i_signed)}}</div>
				<span class="time">{{date('d-M-Y (h:i A)', strtotime($info->created_at))}} </span>
				<a href="javascript:void(0);" class="btn btn-primary btn-sm" id="view_information" data-id="{{$info->i_id}}" data-title="{{$info->i_title}}" data-from="{{$info->i_from}}" data-signed="{{$info->i_signed}}" data-info="{{$info->i_info}}" data-date="{{$info->created_at}}">View</a>
				
			</div>
		</div>
	</li>
	@endforeach
				</ul>
			</div>
		</div>
		<!-- /Education Details -->






		</div>
		@else
		<center><h6>NO RECORD FOUND</h6></center>
		@endif
	</div>






</div>
<!-- /Appointment Tab -->
										
<!-- Prescription Tab -->
	<div class="tab-pane fade" id="pat_prescriptions">
		<div class="card card-table mb-0">
			<div class="card-body">


						<!-- Education Details -->
	<div class="widget education-widget">
		<h4 class="widget-title">Lecture</h4>
		<div class="experience-box">
			<ul class="experience-list">
				@foreach($lectures as $lecture)
				<li>
<div class="experience-user">
<div class="before-circle"></div>
</div>
<div class="experience-content">
			<div class="timeline-content">
				<a href="#/" class="name">{{$lecture->l_topic}}</a>
				<div>By: {{$lecture->lecturer_name}}</div>
				<span class="time">{{date('d-M-Y (h:i A)', strtotime($lecture->created_at))}} </span>
				<a href="javascript:void(0);" class="btn btn-primary btn-sm" id="view_lecture" data-id="{{$lecture->l_id}}" data-topic="{{$lecture->l_topic}}" data-content="{{$lecture->l_content}}" data-name="{{$lecture->lecturer_name}}" data-date="{{$lecture->created_at}}" data-obs="{{$lecture->obs_id}}">Read</a>
			</div>
		</div>
	</li>
	@endforeach
				</ul>
			</div>
		</div>
		<!-- /Education Details -->
				
		</div>
	</div>
</div>
										<!-- /Prescription Tab -->
											
										
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   

@include('inc.changepassword')
@include('inc.information')
@endsection