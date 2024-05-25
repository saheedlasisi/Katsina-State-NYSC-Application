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
	<div class="float-right">
<button class="btn btn-primary btn-sm" id="change_image"><i class="fa fa-plus "></i> Change Profile Pic</button></div>
	<div class="card-body">
		
	<form>
<div class="row form-row">



		{{ csrf_field() }}

<div class="col-md-6">
		<div class="form-group">
			<label>Your Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_saed_name" name="edit_saed_name" value="{{auth()->guard('saedmaster')->user()->name}}">
		</div>
	</div>
<div class="col-md-6">
		<div class="form-group">
			<label>Your Email <span class="text-danger">*</span></label>
			<input type="email" class="form-control" id="edit_saed_email" name="edit_saed_email" value="{{auth()->guard('saedmaster')->user()->email}}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>SAED Title <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_saed_title" name="edit_saed_title" value="{{auth()->guard('saedmaster')->user()->saed_title}}">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Your Phone Number <span class="text-danger">*</span></label>
			<input type="number" class="form-control" id="edit_saed_phone_number" name="edit_saed_phone_number" value="{{auth()->guard('saedmaster')->user()->phone_number}}">
		</div>
	</div>
		<div class="col-md-12">
		<div class="form-group">
			<label>About You and Your Company <span class="text-danger">*</span></label>
			<textarea class="form-control" id="edit_saed_about" name="edit_saed_about">{{auth()->guard('saedmaster')->user()->about}}</textarea>
		</div>
	</div>
		<div class="col-md-12">
		<div class="form-group">
			<label>Company or Office Address <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_saed_address" name="edit_saed_address" value="{{auth()->guard('saedmaster')->user()->address}}">
		</div>
	</div>

		<div class="col-md-6">
		<div class="form-group">
			<label>State Of Origin <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->guard('saedmaster')->user()->state_of_origin}}" readonly >
		</div>
	</div>

		<div class="col-md-6">
		<div class="form-group">
			<label>Residence LGA <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{auth()->guard('saedmaster')->user()->lga}}" readonly >
		</div>
	</div>



<button class="btn btn-primary btn-lg" id="update_profile_btn">Update</button>

	</div>
</form>



</div>
</div>
<!-- /About Me -->
							
	

							

			</div>



					
				</div>
			</div>
		</div>
						

							
						</div>

					</div>

				</div>

			</div>		
			<!-- /Page Content -->

@include('SaedMasterInc.changepassword')
@include('SaedMasterInc.changeimage')
@endsection
