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
							@include('ObsInc.sider')
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
			<label>Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_name" name="edit_name" value="{{auth()->guard('obs')->user()->name}}">
		</div>
	</div>
<div class="col-md-6">
		<div class="form-group">
			<label>Email <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="edit_email" name="edit_email" value="{{auth()->guard('obs')->user()->email}}">
		</div>
	</div>


<button class="btn btn-primary btn-sm" id="update_profile_btn">Update</button>

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


@include('ObsInc.changepassword')
@include('ObsInc.changeimage')
@endsection
