@extends('MainLayouts.app')
@section('content')


<div class="containe">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  	 	@if(count($firsts) > 0)

  	@foreach($firsts as $first)
 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  	@endforeach
  	@else

  	@endif
<?php $no = 1;?>
  	@if(count($slides) > 0)

  	@foreach($slides as $slide)
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
      <img class='d-block w-100' src="{{ asset('assets/img/slideimage/'.$first->slide ) }}" alt=''>
    </div>
  	@endforeach
  	@else

  	@endif

  	
  	  	@if(count($slides) > 0)

  	@foreach($slides as $slide)
 <div class='carousel-item'>
      <img class='d-block w-100' src="{{ asset('assets/img/slideimage/'.$slide->slide ) }}" alt=''>
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

	




			<section class="section home-tile-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-9 m-auto">
							<div class="section-header text-center">
									<h4>WELCOME TO KATSINA STATE NYSC</h4>
								<h5>What are you looking for?</h5>
							
							</div>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/helpdesk/helpdesk4.png" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Help</h3>
												<a href="/helpdesk" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Click here</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/cds.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Cds Projects</h3>
												<a href="/cdsproject" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Find Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/info.png" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
											<h3 class="card-title mb-0">About Katsina State (NYSC)</h3>
												<a href="/about" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">View</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>





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

<!-- Blog Section -->
		   <section class="section section-blogs">
				<div class="container-fluid">
				
					<!-- Section Header -->
					<div class="section-header text-center">
						<h2>Blog</h2>
						<p class="sub-title">blogs and news.</p>
					</div>
					<!-- /Section Header -->
					@if(count($blogs) > 0 )
					<div class="row blog-grid-row">

						@foreach($blogs as $blog)
	<div class="col-md-6 col-lg-3 col-sm-12">
						
							<!-- Blog Post -->
							<div class="blog grid-blog">
								<div class="blog-image">
									<a href="{{asset('assets/img/blog/'.$blog->b_image)}}"><img class="img-fluid" src="{{asset('assets/img/blog/'.$blog->b_image)}}" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<ul class="entry-meta meta-item">
										<li>
											<div class="post-author">
													<a href="{{asset('assets/img/obsimage/'.$blog->image)}}"><img src="{{asset('assets/img/obsimage/'.$blog->image)}}" alt="Post Author"> <span>{{$blog->name}}</span></a>
												</div>
										</li>
										<li><i class="far fa-clock"></i> {{date('d M Y', strtotime($blog->created_at))}}</li>
									</ul>
									<h3 class="blog-title"><a href="/blog/{{$blog->b_title}}">{{$blog->b_title}}</a></h3>
									<p class="mb-0">{!! shorter($blog->b_content, 180) !!}</p>
								</div>
							</div>
							<!-- /Blog Post -->
							
						</div>

						@endforeach

					
						
					</div>
					<div class="view-all text-center"> 
						<a href="/bloglist" class="btn btn-primary">View All</a>
					</div>

					@else

					@endif
				</div>
			</section>
			<!-- /Blog Section -->		





<div class="container-fluid">
<!-- Doctor Widget -->
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Personal CDs Project By:</h4>
								</div>
								
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="/assets/img/developer/IRAWOOOO.jpg">
													<img src="/assets/img/developer/IRAWOOOO.jpg" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="doctor-profile.html">Lasisi Saheed Oluwadamelare</a></h4>
												<p class="doc-speciality">KT/19C/1262</p>
												<p class="doc-speciality">Sponsored by LMDE Limited</p>
												<h5 class="doc-department"><img src="assets/img/dev.png" class="img-fluid" alt="Speciality">Software Developer</h5>
												<div class="rating">
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
													<i class="fas fa-star filled"></i>
												
												</div>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Ijebu north, OGUN STATE</p>
													<ul class="clinic-gallery">
														<li>
															<a href="/assets/img/developer/face.jpg" data-fancybox="gallery">
																<img src="/assets/img/developer/face.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="/assets/img/developer/me.jpg" data-fancybox="gallery">
																<img  src="/assets/img/developer/me.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="/assets/img/developer/IRAWOOOO.jpg" data-fancybox="gallery">
																<img src="/assets/img/developer/IRAWOOOO.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="/assets/img/developer/IRAWOOOO.jpg" data-fancybox="gallery">
																<img src="/assets/img/developer/IRAWOOOO.jpg" alt="Feature">
															</a>
														</li>
													</ul>
												</div>
												<div class="clinic-services">
													<span>Software Developer</span>
													<span> System Analyst</span>
													<span> Graphics Designer</span>
													<span> SEO Manager</span>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<li><i class="far fa-thumbs-up"></i> 100%</li>
													
													<li><i class="fas fa-map-marker-alt"></i> Katsina, Katsina</li>
													
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="/corpsmemberprofile/Lasisi Saheed/1">View Profile</a>
												<a class="apt-btn" href="javascript:void(0);" id="contact_me_btn">Contact Me</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							</div>

@include('MainInc.contactme')
@endsection