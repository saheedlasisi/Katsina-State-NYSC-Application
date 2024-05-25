@extends('MainLayouts.app')
@section('content')
	<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Cds Project</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



@if(count($cds) > 0)





@foreach($cds as $cd)


<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<a href="{{ asset('assets/img/cdsimage/'.$cd->project_image) }}"><img alt="" src="{{ asset('assets/img/cdsimage/'.$cd->project_image) }}" class="img-fluid"></a>
									</div>
									<h3 class="blog-title">{{$cd->project_topic}}</h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
															<a href="/corpsmemberprofile/{{$cd->name}}/{{$cd->id}}"><img src="{{ asset('assets/img/corperimage/'.$cd->profile_pic) }}" alt="Post Author"> <span>{{$cd->name}}</span></a>
													</div>
												</li>
												<li><i class="far fa-money-bill-alt"></i>{{$cd->sponsored_by}}</li>
												<li><i class="fa fa-arrow-left"></i>{{date('d M Y', strtotime($cd->project_from_date))}}</li>
												<li><i class="fa fa-arrow-right"></i>{{date('d M Y', strtotime($cd->project_to_date))}}</li>
												<li><i class="far fa-eye"></i>{{$cd->view}}</li>
												
											</ul>
										</div>
									</div>
									<div class="blog-content">
										{!! $cd->project_detail !!}
									</div>
								</div>
								
							



								<div class="card blog-comments clearfix">
									<div class="card-header">
										<h4 class="card-title">Project Slides Photo</h4>
									</div>
									<div class="card-body pb-0">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  	 	@if(count($firsts) > 0)

  	@foreach($firsts as $first)
 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  	@endforeach
  	@else

  	@endif
<?php $no = 1;?>
  	@if(count($photos) > 0)

  	@foreach($photos as $photo)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$no}}"></li>
  <?php $no++?>
  	@endforeach
  	@else

  	@endif
   
  </ol>
  <div class="carousel-inner">

  	@if(count($firsts) > 0)

  	@foreach($firsts as $first)
 <div class='carousel-item active'>
      <img class='d-block w-100' src="{{ asset('assets/img/cdsimage/'.$first->photo ) }}" alt=''>
    </div>
  	@endforeach
  	@else

  	@endif

  	
  	  	@if(count($photos) > 0)

  	@foreach($photos as $photo)
 <div class='carousel-item'>
      <img class='d-block w-100' src="{{ asset('assets/img/cdsimage/'.$photo->photo ) }}" alt=''>
    </div>
  	@endforeach
  	@else

  	@endif

 
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
									
								</div>
								</div>





								<div class="card author-widget clearfix">
								<div class="card-header">
									<h4 class="card-title">About Corpsmember</h4>
									</div>
								<div class="card-body">
									<div class="about-author">
										<div class="about-author-img">
											<div class="author-img-wrap">
												<a href="/corpsmemberprofile/{{$cd->name}}/{{$cd->id}}"><img class="img-fluid rounded-circle" alt="" src="{{ asset('assets/img/corperimage/'.$cd->profile_pic) }}"></a>
											</div>
										</div>
										<div class="author-details">
											<a href="doctor-profile.html" class="blog-author-name">{{$cd->name}}</a>
											<p class="mb-0">{!! $cd->about_me !!}</p>
										</div>
									</div>
								</div>
								</div>

								
							<div class="card blog-share clearfix">
									<div class="card-header">
										<h4 class="card-title">Share the post</h4>
									</div>
									<div class="card-body">
										<ul class="social-share">
											<li><a href="#" title="Facebook"><i class="fab fa-facebook"></i></a></li>
											<li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
											<li><a href="#" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
											<li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">


						@include('MainInc.cdssider')

							
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>
				</div>

			</div>		
			<!-- /Page Content -->

@endforeach
			@else

<center><h4>NO RECORD FOUND</h4></center>

			@endif






@endsection			