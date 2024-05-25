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
							<h2 class="breadcrumb-title">List</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->


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




<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
						
							<div class="row blog-grid-row">

								@if(count($cds) > 0 )
								@foreach($cds as $cd)
<div class="col-md-6 col-sm-12">
								
									<!-- Blog Post -->
									<div class="blog grid-blog">
										<div class="blog-image">
											<a href="{{ asset('assets/img/cdsimage/'.$cd->project_image) }}"><img class="img-fluid" src="{{ asset('assets/img/cdsimage/'.$cd->project_image) }}" alt="Post Image"></a>
										</div>
										<div class="blog-content">
											<ul class="entry-meta meta-item">
												<li>
													<div class="post-author">
														<a href="/corpsmemberprofile/{{$cd->name}}/{{$cd->id}}"><img src="{{ asset('assets/img/corperimage/'.$cd->profile_pic) }}" alt="Post Author"> <span>{{$cd->name}}</span></a>
													</div>
												</li>
												<li><i class="far fa-clock"></i> {{date('d M Y', strtotime($cd->project_to_date))}}</li>
											</ul>
											<h3 class="blog-title"><a href="/cds/{{$cd->project_topic}}/{{$cd->cds_project_id}}">{{$cd->project_topic}}</a></h3>
											<p class="mb-0">{!! shorter($cd->project_detail, 100) !!}</p>
										</div>
									</div>
									<!-- /Blog Post -->
									
								</div>
								@endforeach
								@else

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
							<!-- /Blog Pagination -->
							
						</div>
						
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							

					@include('MainInc.cdsside')

							
							
						</div>
						<!-- /Blog Sidebar -->
						
					</div>
				</div>
			</div>	
			<!-- /Page Content -->








@endsection			