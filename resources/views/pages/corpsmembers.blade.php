@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashbord</a></li>
									<li class="breadcrumb-item active" aria-current="page">Corps Members</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">corps members</h2>
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
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Corps Members</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Friend Request <span><div class="badge badge-danger badge-pill" id="total_request"> </div></span></a> 
											</li>
										
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
	<div id="pat_appointments" class="tab-pane fade show active">

		
		<div class="card">
			<div>
				<input type="text" name="search_corps" id="search_corps" class="form-control" placeholder="Search: Enter Corps Member Name Or Email">
			</div>
			<br />
			<div class="card-body">

				<div id="corpsmembers_list">
				<!-- Doctor Widget -->


							<!-- DoctorWidget -->
							</div>
			
	</div>
	
	</div>








</div>
<!-- /Appointment Tab -->
										
<!-- Prescription Tab -->
	<div class="tab-pane fade" id="pat_prescriptions">
		<div class="card">
			<div class="card-body">

					<div id="request_list">
				<!-- Doctor Widget -->


							<!-- DoctorWidget -->
							</div>
			

		</div>
	</div>
</div>
									
										
										
										
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
@endsection