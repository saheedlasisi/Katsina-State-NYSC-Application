@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit My Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$user_name}}</h2>
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
						@include('inc.dashnav')
						<!-- / Profile Sidebar -->
						
<div class="col-md-7 col-lg-8 col-xl-9">
						
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Profile Settings</h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab"> Information</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Education</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab">Award</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab4" data-toggle="tab">Work Exprience</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab5" data-toggle="tab">Specializations</a></li>
		
		</ul>
		<div class="tab-content">


			<div class="tab-pane show active" id="solid-tab1">

	<!-- Basic Information -->
<div class="card">
	<div class="float-right">
<button class="btn btn-primary btn-sm" id="change_image"><i class="fa fa-plus "></i> Change Profile Pic</button></div>
<div class="card-body">
	<h4 class="card-title">Basic Information</h4>

	<div class="row form-row">


		<div class="col-md-6">
			<div class="form-group">
				<label>State Code <span class="text-danger">*</span></label>
				<input type="text" class="form-control" value="{{auth()->user()->state_code}}" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Email <span class="text-danger">*</span></label>
				<input type="email" class="form-control" value="{{auth()->user()->email}}" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Full Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" value="{{auth()->user()->name}}" readonly>
			</div>
		</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Account Status <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->user()->account_status}}" readonly>
		</div>
	</div>


<div class="col-md-4">
		<div class="form-group">
			<label>Batch <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->user()->batch}}" readonly>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Stream <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->user()->stream}}" readonly>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Year <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->user()->year}}" readonly>
		</div>
	</div>

	<center><h6><i style="color: red;">Only the manangement can amend the information shown here, for amendement visit the Admin block.</i></h6></center>

	</div>
		</div>
	</div>
	<!-- /Basic Information -->
							
<!-- About Me -->
<div class="card">
	<div class="card-body">
		<h4 class="card-title">About Me</h4>
			<form>
<div class="row form-row">

<div class="col-md-12">
<div class="form-group mb-0">
<label>Biography <span class="text-danger">*</span></label>
<textarea class="form-control" rows="5" id="about_me" name="about_me">{{auth()->user()->about_me}}</textarea>
	</div>
		</div>

		{{ csrf_field() }}

<div class="col-md-4">
		<div class="form-group">
			<label>Phone Number <span class="text-danger">*</span></label>
			<input type="number" class="form-control" id="phone_number" name="phone_number" value="{{auth()->user()->phone_number}}">
		</div>
	</div>
<div class="col-md-4">
		<div class="form-group">
			<label>Whatsapp Number <span class="text-danger">*</span></label>
			<input type="number" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{auth()->user()->whatsapp_number}}">
		</div>
	</div>

<div class="col-md-4">
		<div class="form-group">
			<label>Facebook Profile ID <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="facebook_id" name="facebook_id" value="{{auth()->user()->facebook_id}}" placeholder="E.g: saheed.oluwadhamelare">
		</div>
	</div>



	<div class="col-md-4">
	<div class="form-group">
		<label>Gender <span class="text-danger">*</span></label>
		<select class="form-control select" id="gender" name="gender">
			<option value="">Select</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	</div>
</div>

	<div class="col-md-4">
	<div class="form-group">
		<label>Religion <span class="text-danger">*</span></label>
		<select class="form-control select" id="religion" name="religion">
			<option value="">Select</option>
			<option value="Muslim">Muslim</option>
			<option value="Christian">Christian</option>
		</select>
	</div>
</div>

	<div class="col-md-4">
	<div class="form-group">
		<label>Marital Status <span class="text-danger">*</span></label>
		<select class="form-control select" id="marital_status" name="marital_status">
			<option value="">Select</option>
			<option value="Single">Single</option>
			<option value="Married">Married</option>
			<option value="Dating">Dating</option>
			
		</select>
	</div>
</div>

	<div class="col-md-4">
	<div class="form-group">
		<label>Platoon <span class="text-danger">*</span></label>
		<select class="form-control select" id="platoon" name="platoon">
			<option value="">Select</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>

			
			
		</select>
	</div>
</div>

	<div class="col-md-4">
	<div class="form-group">
		<label>State of Origin <span class="text-danger">*</span></label>
		<select class="form-control select" id="state_of_origin" name="state_of_origin">
			<option value="">Select</option>

			@foreach($states as $state)
			<option value="{{$state->state_id}}">{{$state->state}}</option>
			@endforeach
			
		</select>
	</div>
</div>


	<div class="col-md-4">
	<div class="form-group">
		<label>Serving/Served (LGA) <span class="text-danger">*</span></label>
		<select class="form-control select" id="serving_lga" name="serving_lga">
			<option value="">Select</option>
			@foreach($lgas as $lga)
			<option value="{{$lga->lga_name}}">{{$lga->lga_name}}</option>
			@endforeach
			
		</select>
	</div>
</div>

<button class="btn btn-success btn-sm" id="update_profile_btn">Update</button>



<input type="hidden" id="var_gender" value="{{auth()->user()->gender}}">
<input type="hidden" id="var_religion" value="{{auth()->user()->religion}}">
<input type="hidden" id="var_marital_status" value="{{auth()->user()->marital_status}}">
<input type="hidden" id="var_platoon" value="{{auth()->user()->platoon}}">
<input type="hidden" id="var_state_of_origin" value="{{auth()->user()->state_of_origin}}">
<input type="hidden" id="var_serving_lga" value="{{auth()->user()->serving_lga}}">


	</div>
</form>



</div>
</div>
<!-- /About Me -->
							
	<!-- Clinic Info -->
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Photos</h4>

			<div class="row form-row">
			
			<form id="upload_image_form" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
					<div class="col-md-12">
						
						<div class="alert" id="message" style="display: none;"></div>
		<div class="form-group">
			<label>Upload Photos <span class="text-danger">*</span></label>
			<input type="file" name="usersphoto" id="usersphoto" accept="image/jpeg," class="form-control">

			<input type="submit" id="upload_usersphoto_btn" name="upload_usersphoto_btn" class="btn btn-success btn-sm">

		</div>
	</div>
					
</form>

	<div class="col-md-12">
		<div class="form-group">
			<label>Uploaded Photos</label>
			<form action="#" class="dropzone"></form>
		</div>
						<div class="upload-wrap">

							@if(count($photos) > 0)
							@foreach($photos as $photo)
							<div class="upload-images">
								<img src="{{ asset('assets/img/corperimage/'.$photo->photo) }}" alt="Upload Image">
		<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm" data-id="{{$photo->user_photo_id}}" id="delete_my_photo"><i class="far fa-trash-alt"></i></a>
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
		<!-- /Clinic Info -->

							

			</div>




					<div class="tab-pane" id="solid-tab2">
						<div class="card">
							<div class="card-body">
								<div class="float-right">
							<button class="btn btn-primary btn-sm" id="add_education_btn"><i class="fa fa-plus "></i> Add Education</button>
						</div>

				
					<!-- Education Details -->
	<div class="widget education-widget">
		<h4 class="widget-title">Education</h4>
		<div class="experience-box">
			<ul class="experience-list" id="fetcheducation">


		</ul>
	</div>
</div>
<!-- /Education Details -->
</div>
	</div>
		
	</div>






					<div class="tab-pane" id="solid-tab3">
						<div class="float-right">
							<button class="btn btn-primary btn-sm" id="add_award_btn"><i class="fa fa-plus "></i> Add Award</button>
						</div>


						<!-- Awards Details -->
			<div class="widget awards-widget">
				<h4 class="widget-title">Awards</h4>
				<div class="experience-box">
					<ul class="experience-list" id="fetchaward">
						
												
													
					</ul>
				</div>
			</div>
			<!-- /Awards Details -->


					</div>





					<div class="tab-pane" id="solid-tab4">
						<div class="float-right">
				<button class="btn btn-primary btn-sm" id="add_work_btn"><i class="fa fa-plus "></i> Add Work</button>
						</div>

						<!-- Experience Details -->
<div class="widget experience-widget">
	<h4 class="widget-title">Work & Experience</h4>
	<div class="experience-box">
		<ul class="experience-list" id="fetchwork">
			
													
		</ul>
	</div>
</div>
<!-- /Experience Details -->

					</div>



					<div class="tab-pane" id="solid-tab5">
						
						<div class="float-right">
				<button class="btn btn-primary btn-sm" id="add_skill_btn"><i class="fa fa-plus "></i> Add Specializations </button>
						</div>


						<!-- Services List -->
				<div class="service-list">
					<h4>Services</h4>
					<ul class="clearfix" id="fetchskill">
						
					</ul>
				</div>
											<!-- /Services List -->

					</div>

					
				</div>
			</div>
		</div>
						

							
						</div>

					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@include('inc.changepassword')
@include('inc.image')
@include('inc.skill')
@include('inc.work')
@include('inc.award')
@include('inc.education')
@endsection