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
									<li class="breadcrumb-item active" aria-current="page">Blog</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Blog Details</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



				<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						
				@if(count($blogs) > 0)
				@foreach($blogs as $blog)
				<div class="col-lg-8 col-md-12">
							<div class="blog-view">
								<div class="blog blog-single-post">
									<div class="blog-image">
										<a href="{{asset('assets/img/blog/'.$blog->b_image)}}"><img alt="" src="{{asset('assets/img/blog/'.$blog->b_image)}}" class="img-fluid"></a>
									</div>
									<h3 class="blog-title">{{$blog->b_title}}</h3>
									<div class="blog-info clearfix">
										<div class="post-left">
											<ul>
												<li>
													<div class="post-author">
														<a href="{{asset('assets/img/obsimage/'.$blog->image)}}"><img src="{{asset('assets/img/obsimage/'.$blog->image)}}" alt="Post Author"> <span>{{$blog->name}}</span></a>
													</div>
												</li>
												<li><i class="far fa-calendar"></i>{{date('d M Y', strtotime($blog->created_at))}}</li>
												<li><i class="far fa-comments"></i><span id="t_comment"></span></li>
												<li><i class="fa fa-tags"></i>{{$blog->category_name}}</li>
											</ul>
										</div>
									</div>
									<div class="blog-content">
										{!! $blog->b_content !!}
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
								
								<div class="card blog-comments clearfix">
									<div class="card-header">
										<h4 class="card-title" id="total_comment"></h4>
									</div>
									<div class="card-body pb-0">
									<ul class="comments-list">
										
										
									</ul>
								</div>
								</div>

<input type="hidden" class="form-control" name="get_blog_id" id="get_blog_id" value="{{$blog->b_id}}">
								@guest


								<div class="card new-comment clearfix">
									<div class="card-header">
										<h4 class="card-title">Leave Comment</h4>
									</div>
									<div class="card-body">
										<form action="{{ URL::to('/guestcomment') }}" method="POST" id="guest_comment_form">
											 {{ csrf_field() }}
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input type="hidden" class="form-control" name="guest_blog_title" id="guest_blog_title" value="{{$blog->b_title}}">
												<input type="hidden" class="form-control" name="guest_blog_id" id="guest_blog_id" value="{{$blog->b_id}}">
												<input type="text" class="form-control" name="guest_comment_name" id="guest_comment_name" >
											</div>
											<div class="form-group">
												<label>Your Email Address <span class="text-danger">*</span></label>
												<input type="email" class="form-control" name="guest_comment_email" id="guest_comment_email">
											</div>
											<div class="form-group">
												<label>Comments</label>
												<textarea rows="4" class="form-control" name="guest_comment" id="guest_comment"></textarea>
											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit">Comment</button>
											</div>
										</form>
									</div>
								</div>
								@else

								

								<div class="card new-comment clearfix">
									<div class="card-header">
										<h4 class="card-title">Leave Comment</h4>
									</div>
									<div class="card-body">
										<form action="{{ URL::to('/usercomment') }}" method="POST" id="user_comment_form">
										 {{ csrf_field() }}
											<div class="form-group">
												<label>Comments</label>
												<input type="hidden" class="form-control" name="user_blog_title" id="user_blog_title" value="{{$blog->b_title}}">

												<input type="hidden" class="form-control" name="user_blog_id" id="user_blog_id" value="{{$blog->b_id}}">

												<input type="hidden" class="form-control" value="{{auth()->user()->email}}" name="user_comment_email" id="user_comment_email">

												<input type="hidden" class="form-control" value="{{auth()->user()->name}}" name="user_comment_name" id="user_comment_name">

												<input type="hidden" value="{{auth()->user()->profile_pic}}" name="user_comment_image" id="user_comment_image">

												<textarea rows="4" class="form-control" name="user_comment" id="user_comment"></textarea>
											</div>
											<div class="submit-section">
												<button class="btn btn-primary submit-btn" type="submit">Submit</button>
											</div>
										</form>
									</div>
								</div>								@endguest


								
								
							</div>
						</div>


				@endforeach				
				@else
				<center><h1>OH SORRY IT'S SEEM WE DON'T HAVE RECORD FOR WHAT YOU'RE LOOKING FOR, THANKS.</h1></center>
				@endif
					
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

						@include('MainInc.blogside')
							
						</div>
						<!-- /Blog Sidebar -->
						
                </div>
				</div>

			</div>		
			<!-- /Page Content -->



@endsection