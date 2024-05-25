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
									<li class="breadcrumb-item active" aria-current="page">Home Page</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Home Slide</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			@include('ObsInc.message')


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
                                                <a class="nav-link active" href="{{route('obs.slide')}}">Slides</a>
                                            </li>
                                         
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.createslide')}}"><i class="fas fa-plus mr-1"></i> Upload Slide Picture</a>
                                    </div>
                                   
                                </div>



                                			<!-- Blog -->
								<div class="row blog-grid-row">

									@if(count($slides) > 0)
									@foreach($slides as $slide)

									<div class="col-md-6 col-xl-4 col-sm-12">
									
										<!-- Blog Post -->
										<div class="blog grid-blog">
											<div class="blog-image">
												<a href="{{asset('assets/img/slideimage/'.$slide->slide)}}"><img class="img-fluid" src="{{asset('assets/img/slideimage/'.$slide->slide)}}" alt="Post Image"></a>
											</div>
										
											<div class="row pt-3">
												

												
											<div class="col text-center"><a href="javascript:void(0);" class="text-danger"  id="delete_slide_btn" data-id="{{$slide->slide_id}}" ><i class="far fa-trash-alt"></i> Delete</a></div>													
												

												
											</div>
										</div>
										<!-- /Blog Post -->
										
									</div>
									@endforeach
										
									
									@else 
									<center><h1>No Record Found</h1></center>
									@endif
								
									
									
									</div>
                       
							
								<!-- Blog Pagination -->
								<div class="row">
									<div class="col-md-12">
										<div class="blog-pagination">
											
									{{$slides->links()}}
										</div>
									</div>
								</div>
									
									
									
								</div>
						

							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){

var _tokens = $('input[name=_token]').val();





$('body').delegate('#delete_slide_btn', 'click', function(e){

		e.preventDefault();
		var slide_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deleteslide')}}",
		method:"POST",
		data:{slide_id:slide_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});







	});
</script>


@include('ObsInc.changepassword')
@endsection