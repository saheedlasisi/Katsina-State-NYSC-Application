@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Shop</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Shop</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
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
		<h4 class="card-title">Shop Settings [{{$shop->shop_auth_id}} - Shop Account Status: {{$shop->shop_account_status}}]</h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab"> Information</a></li>
			
			<li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab">Award</a></li>
			
		
		</ul>
		<div class="tab-content">


			<div class="tab-pane show active" id="solid-tab1">

	<!-- Basic Information -->
<div class="card">

<div class="card-body">
	<h4 class="card-title">Basic Information</h4>

	<div class="row form-row">
<div class="col-md-12">
			<div class="form-group">
				<div class="change-avatar">
					<div class="profile-img">
						<img src="{{asset('assets/img/shopimage/'.$shop->shop_image) }}" alt="User Image">
					</div>
					<div class="upload-img">
						<button class="btn btn-primary btn-sm" id="change_shop_image"><i class="fa fa-plus "></i> Change Shop Image</button>
						
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Shop Name <span class="text-danger">*</span></label>
				<input type="text" class="form-control" value="{{$shop->shop_name}}" name="edit_shop_name" id="edit_shop_name" >
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Shop Phone Number <span class="text-danger">*</span></label>
				<input type="number" class="form-control" value="{{$shop->shop_phone_number}}" name="edit_shop_phone_number" id="edit_shop_phone_number">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Shop Address <span class="text-danger">*</span></label>
				<input type="text" class="form-control" value="{{$shop->shop_address}}" name="edit_shop_address" id="edit_shop_address">
			</div>
		</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Shop Specialization <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{$shop->shop_specialist}}" name="edit_shop_specialist" id="edit_shop_specialist">
		</div>
	</div>


<div class="col-md-4">
		<div class="form-group">
			<label>Shop Open Hour <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{$shop->shop_open_hour}}" name="edit_shop_open_hour" id="edit_shop_open_hour">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Shop Closing Hour <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{$shop->shop_closing_hour}}" name="edit_shop_closing_hour" id="edit_shop_closing_hour">
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Shop Working Days <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{$shop->shop_working_days}}" name="edit_shop_working_days" id="edit_shop_working_days">
		</div>
	</div>
<div class="col-md-12">
<div class="form-group mb-0">
<label>Biography <span class="text-danger">*</span></label>
<textarea class="form-control" rows="5" id="edit_about_shop" name="edit_about_shop">{{$shop->about_shop}}</textarea>
	</div>
</div>
<br />
<hr />
	<div class="col-md-6">
		<div class="form-group">
			<label>Shop Email Address <span class="text-danger">*</span></label>
			<input type="text" class="form-control" value="{{$shop->shop_email}}" name="edit_shop_email" id="edit_shop_email">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Updated Button <span class="text-danger">*</span></label>
		<button class="btn btn-warning form-control" data-id="{{$shop->shop_id}}" id="shop_update_btn">Update</button>
		</div>
	</div>

	
	

	</div>
		</div>
	</div>
	<!-- /Basic Information -->
							

</div>


<!--//Awards -->
<div class="tab-pane" id="solid-tab3">
						<div class="float-right">
							<button class="btn btn-primary btn-sm" id="add_shopaward_btn"><i class="fa fa-plus "></i> Add Award</button>
						</div>
<input type="hidden" name="shop_id" id="shop_id" value="{{$shop->shop_id}}">

						<!-- Awards Details -->
			<div class="widget awards-widget">
				<h4 class="widget-title">Awards</h4>
				<div class="experience-box">
					<ul class="experience-list" id="fetchshopaward">
						
												
													
					</ul>
				</div>
			</div>
			<!-- /Awards Details -->


					</div>





					



			

					
				</div>
			</div>
		</div>
						

							
						</div>

					</div>

				</div>

			</div>	

@include('inc.changepassword')				
@include('inc.shopaward')
@include('inc.changeshopimage')
@endsection