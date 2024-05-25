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
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Add Blog</h2>
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
                                            <li class="nav-item">
                                            	<a class="nav-link " href="{{route('obs.category')}}">Categories</a>
                                              
                                            </li>
                                            <li class="nav-item">
                                                  <a class="nav-link" href="{{route('obs.blog')}}">Blog</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.blog')}}"><i class="fas fa-plus mr-1"></i> Add Blog</a>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" id="add_category"><i class="fas fa-plus mr-1" ></i> Add Category</a>
                                    </div>
                                </div>
			
								


  <!-- Add Blog -->
	<div class="card">
		<div class="card-body">	
			<h3 class="pb-3">Add Blog</h3>
	<form>
		{{ csrf_field() }}
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-8">
		<div class="form-group">
	<label>Blog Title <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="blog_title" id="blog_title" >
	</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
	<label>Category <span class="text-danger">*</span></label>
	<select class="form-control select" name="blog_category" id="blog_category"> 
	

	</select>
	</div>
	</div>
	</div>
</div>
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
	<label>Contents <span class="text-danger">*</span></label>
	<textarea id="blog_content" class="form-control service-desc" name="blog_content"></textarea>
			</div>
		</div>
	</div>
</div>


											
<div class="service-fields mb-3" style="border-right: 1px solid #ddd;" id="blog_image_preview_id">

	<div class="row">
	<div class="col-lg-12">
	<div id="blog_image_preview">

														
	</div>	

	</div>
	</div>

	<div class="row">
	<div class="col-lg-12">
	<div class="service-upload">
<i class="fas fa-cloud-upload-alt"></i>
<span>Upload Blog Images *</span>
<input type="file" name="blog_upload_image" id="blog_upload_image" accept="image/jpeg, image/png, image/gif,">
														
</div>	

</div>
</div>
</div>


<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="blog_upload_btn">Upload</button>
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


@include('ObsInc.category')
@include('ObsInc.changepassword')
@include('ObsInc.editcategory')
@endsection