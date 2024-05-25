@include('ObsInc.information')
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
									<li class="breadcrumb-item active" aria-current="page">Information</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Information</h2>
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
						
							<!-- Profile Sidebar -->						@include('ObsInc.sider')
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="doc-review review-listing">

								<div class="row mb-5">
                                    <div class="col">
                                        <ul class="nav nav-tabs nav-tabs-solid">
                                            <!-- <li class="nav-item">
                                            	<a class="nav-link active" href="{{route('obs.category')}}"> Your Categories</a>
                                              
                                            </li>
                                            <li class="nav-item">
                                                  <a class="nav-link" href="{{route('obs.blog')}}">View Blog</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                   <!--  <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.addblog')}}"><i class="fas fa-plus mr-1"></i> Add Blog</a>
                                    </div> -->
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" id="create_an_information"><i class="fas fa-plus mr-1" ></i> Create An Information</a>
                                    </div>
                                </div>
							
								<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
							
				<div class="widget awards-widget">
				<h4 class="widget-title">Information</h4>
				<div class="experience-box">
					<ul class="experience-list" id="information_table">
						
												
													
					</ul>
				</div>
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
@include('ObsInc.editinformation')
@endsection