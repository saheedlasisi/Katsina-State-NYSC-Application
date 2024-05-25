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
									<li class="breadcrumb-item active" aria-current="page">Lecture</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Lectures</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->




<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->						
							@include('ObsInc.sider')
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="doc-review review-listing">

								<div class="row mb-5">
                                    <div class="col">
                                 
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.addlecture')}}"><i class="fas fa-plus mr-1"></i> Add Lecture</a>
                                    </div>
                               
                                </div>
							
								<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
								<table class="datatable table table-hover table-center mb-0" id="lecture_data_table">
											<thead>
												<tr>
													<th>#</th>
													<th>Topic</th>
													<th>Lecturer</th>
													<th>Batch</th>
													<th>Stream</th>
													<th>Year</th>
													<th>Questions</th>
													<th>Views</th>
													<th>Date</th>
													<th>Manage</th>
													</tr>
											</thead>
											<tbody id="lecture_table">
											
												
										
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
					</div>
								

							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->




@include('ObsInc.changepassword')
@endsection