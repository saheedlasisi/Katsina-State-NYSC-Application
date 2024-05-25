@include('AdminModal.obs')
@extends('AdminLayouts.app')
@section('content')


   		<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7">
								<h3 class="page-title">Staff </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Staff</li>
								</ul>
							</div>

								<div class="col-sm-5 col">
								<a href="javascript:void(0);" class="btn btn-primary float-right mt-2" id="register_obs">Add</a>
							</div>
						</div>
						</div>
					</div>



					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Email</th>
													
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody id="obs_table">
												<tr>
													<td></td>
													<td>
														
													</td>
													
													<td>
														
													</td>
													<td></td>
													<td>
														
													</td>
													<td></td>
													<td class="text-right">
														
													</td>
												</tr>
												
										
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



@endsection