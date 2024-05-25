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
									<li class="breadcrumb-item active" aria-current="page">CDs</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Cds Project</h2>
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
                                                <a class="nav-link active" href="{{route('obs.cds')}}">Cds Projects</a>
                                            </li>
                                         
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.createcds')}}"><i class="fas fa-plus mr-1"></i> Upload Cds Project</a>
                                    </div>
                                   
                                </div>




                                						<!-- Blog -->
								<div class="row blog-grid-row">
									<?php // Start function
function shorter($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}?>
									@if(count($cds) > 0)
									@foreach($cds as $cd)

									<div class="col-md-6 col-xl-4 col-sm-12">
									
										<!-- Blog Post -->
										<div class="blog grid-blog">
											<div class="blog-image">
												<a href="{{asset('assets/img/cdsimage/'.$cd->project_image)}}"><img class="img-fluid" src="{{asset('assets/img/cdsimage/'.$cd->project_image)}}" alt="Post Image"></a>
											</div>
											<div class="blog-content">
												<ul class="entry-meta meta-item">
													<li>
														<div class="post-author">
															<a href="{{asset('assets/img/corperimage/'.$cd->profile_pic)}}"><img src="{{asset('assets/img/corperimage/'.$cd->profile_pic)}}" alt="Post Author"> <span>{{$cd->name}}</span></a>
														</div>
													</li>
													<li><i class="far fa-clock"></i> {{date('d M Y', strtotime($cd->project_from_date))}}</li>

													
												</ul>
												<h3 class="blog-title"><a href="javascript:void(0);">{{$cd->project_topic}}</a></h3>
												<p class="mb-0">{!! shorter($cd->project_detail, 100) !!}</p>
											</div>
											<div class="row pt-3">
												<div class="col"><a href="{{route('obs.editcds', $cd->cds_project_id)}}" class="text-success"><i class="far fa-edit"></i> Edit</a></div>

												
											<div class="col text-center"><a href="javascript:void(0);" class="text-danger"  id="cds_deletion_btn" data-id="{{$cd->cds_project_id}}" ><i class="far fa-trash-alt"></i> Delete</a></div>													
												

												
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
											{{$cds->links()}}
									
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



$('body').delegate('#cds_deletion_btn', 'click', function(e){

    e.preventDefault();
    var cds_id = $(this).data('id');
     var _token = $('input[name=_token]').val();

      if (confirm('Are you sure of this?')) {

      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('obs.deletecds')}}",
    method:"POST",
    data:{cds_id:cds_id,_token:_token},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();

    }

})

  }


});











	});
</script>


@include('ObsInc.changepassword')
@endsection