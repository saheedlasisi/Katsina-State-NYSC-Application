@extends('StaffLayouts.app')
@section('content')
	<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('staff.dashboard')}}">Staff</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



@include('StaffInc.message')



			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<!-- <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							
							
						</div> -->
						
						<div class="col-md-12 col-lg-12 col-xl-12">
							<!-- class="col-md-7 col-lg-8 col-xl-9" -->



							<div class="card">
	<div class="card-header">
		<h4 class="card-title">Profile Settings</h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab"> Information</a></li>
			
		
		</ul>
		<div class="tab-content">


			<div class="tab-pane show active" id="solid-tab1">

	
							
<!-- About Me -->
<div class="card">

	<div class="card-body">
		
	<form>
<div class="row form-row">



		{{ csrf_field() }}

<div class="col-md-4">
		<div class="form-group">
			<label>Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_name" name="edit_name" value="{{auth()->guard('staff')->user()->name}}">
		</div>
	</div>
<div class="col-md-4">
		<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_email" name="edit_email" value="{{auth()->guard('staff')->user()->email}}">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label>Phone Number <span class="text-danger">*</span></label>
			<input type="number" class="form-control" id="edit_phone_number" name="edit_phone_number" value="{{auth()->guard('staff')->user()->phone_number}}">
		</div>
	</div>


<button class="btn btn-primary btn-sm" id="update_profile_btn">Update</button>

	</div>
</form>



</div>
</div>
<!-- /About Me -->











<!-- About Me -->
<div class="card">
<div class="card-header">
	<h3 class="card-title">Change your Password here</h3>
</div>
	<div class="card-body">
		
	<form>
<div class="row form-row">



		{{ csrf_field() }}

<div class="col-md-6">
		<div class="form-group">
			<label>Password <span class="text-danger">*</span></label>
			<input type="password" class="form-control" id="edit_password" name="edit_password">
		</div>
	</div>
<div class="col-md-6">
		<div class="form-group">
			<label>Password Again <span class="text-danger">*</span></label>
			<input type="password" class="form-control" id="edit_password_again" name="edit_password_again">
		</div>
	</div>



<button class="btn btn-primary btn-sm" id="update_password_btn">Update</button>

	</div>
</form>



</div>
</div>
<!-- /About Me -->
							
	








<!-- Clinic Info -->
	<div class="card">
		<div class="card-body">
			<h3 class="card-title">Here you can change project image</h3>

	<div class="service-fields mb-3" style="border-right: 1px solid #ddd;">

	<div class="row">
	<div class="col-lg-12">
	<div id="edit_image_preview">

														
	</div>	

	</div>
	</div>

	<div class="row">
	<div class="col-lg-12">
	<div class="service-upload">
<i class="fas fa-cloud-upload-alt"></i>
<span>Project Images *</span>
<input type="file" name="edit_image" id="edit_image" accept="image/jpeg, image/png, image/gif,">

</div>	

</div>
</div>
</div>

<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="edit_image_upload_btn">Upload</button>
	</div>
				</div>
			</div>
		</div>
		<!-- /Clinic Info -->			















							

			</div>



					
				</div>
			</div>
		</div>

		</div>



	</div>
	</div>		
<!-- /Page Content -->
   


			



@endsection