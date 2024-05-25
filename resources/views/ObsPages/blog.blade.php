
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
							<h2 class="breadcrumb-title">Blog</h2>
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
                                                <a class="nav-link active" href="{{route('obs.blog')}}">Your Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('obs.category')}}"> View Categories</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="{{route('obs.addblog')}}"><i class="fas fa-plus mr-1"></i> Add Blog</a>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" id="add_category"><i class="fas fa-plus mr-1"></i> Add Category</a>
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
									@if(count($blogs) > 0)
									@foreach($blogs as $blog)

									<div class="col-md-6 col-xl-4 col-sm-12">
									
										<!-- Blog Post -->
										<div class="blog grid-blog">
											<div class="blog-image">
												<a href="{{asset('assets/img/blog/'.$blog->b_image)}}"><img class="img-fluid" src="{{asset('assets/img/blog/'.$blog->b_image)}}" alt="Post Image"></a>
											</div>
											<div class="blog-content">
												<ul class="entry-meta meta-item">
													<li>
														<div class="post-author">
															<a href="javascript:void(0);"><img src="{{asset('assets/img/obsimage/'.auth()->guard('obs')->user()->image)}}" alt="Post Author"> <span>{{auth()->guard('obs')->user()->name}}</span></a>
														</div>
													</li>
													<li><i class="far fa-clock"></i> {{date('d M Y', strtotime($blog->created_at))}}</li>
												</ul>
												<h3 class="blog-title"><a href="blog-details.html">{{$blog->b_title}}</a></h3>
												<p class="mb-0">{!! shorter($blog->b_content, 150) !!}</p>
											</div>
											<div class="row pt-3">
												<div class="col"><a href="{{route('obs.editblog', $blog->b_title)}}" class="text-success"><i class="far fa-edit"></i> Edit</a></div>

												@if($blog->user_blog_status == 'active')
												<div class="col text-right"><a href="javascript:void(0);" class="text-warning" id="blog_inactive_btn" data-id="{{$blog->b_id}}"><i class="fas fa-ban"></i> Inactive</a></div>
												@else

												<div class="col text-right"><a href="javascript:void(0);" class="text-success" id="blog_activate_btn" data-id="{{$blog->b_id}}"><i class="fas fa-eye"></i> activate</a></div>
												@endif
																											
												

												
											</div>
											<div class="card-footer">
												<div class="col text-center"><a href="javascript:void(0);" class="text-danger"  id="blog_deletion_btn" data-id="{{$blog->b_id}}" ><i class="far fa-trash-alt"></i> Delete</a></div>
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
											{{$blogs->links()}}
									
										</div>
									</div>
								</div>
								<!-- /Blog Pagination -->
								<!-- /Blog -->

							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->



@include('ObsInc.category')
@include('ObsInc.changepassword')
@endsection