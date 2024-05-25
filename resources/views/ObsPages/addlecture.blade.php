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
							<h2 class="breadcrumb-title">Add Lecture</h2>
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
                                        <a class="btn btn-warning btn-sm" href="{{route('obs.lectures')}}"><i class="fas fa-eye mr-1"></i> Manage Lectures</a>
                                    </div>
                                  
                                </div>
			
								


  <!-- Add Blog -->
	<div class="card">
		<div class="card-body">	
			<h3 class="pb-3">Add Lecture</h3>
	<form action="{{ URL::to('obs/storelecture') }}" method="POST" id="lecture_form">
		{{ csrf_field() }}
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-7">
		<div class="form-group">
	<label>Lecture's Topic <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="lecture_topic" id="lecture_topic" placeholder="Enter Topic">
	</div>
	</div>

	<div class="col-lg-5">
		<div class="form-group">
	<label>Lecturer Name <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="lecturer_name" id="lecturer_name" placeholder="Enter Lecturer Name">
	</div>
	</div>

	</div>
</div>
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
	<label>Lecture's Content<span class="text-danger">*</span></label>
	<textarea id="lecture_content" class="form-control service-desc" name="lecture_content"></textarea>
			</div>
		</div>
	</div>
</div>


          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
  <label>Batch<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_batch" id="info_batch" required > 
  <option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>

  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Stream<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_stream" id="info_stream" required > 
  
  <option value="1">1</option>
  <option value="2">2</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Year<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_year" id="info_year" required > 
  
@foreach($useryears as $useryear)
<option value="{{$useryear->year}}">{{$useryear->year}}</option>
@endforeach
  </select>
  </div>
            </div>

          </div>
											



<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload">Upload</button>
	</div>
</form>

	</div>
</div>
<!-- /Add Blog -->                              


							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->




@include('ObsInc.changepassword')
@endsection