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
							<h2 class="breadcrumb-title">Blog List</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



		<!-- Page Content -->
			<div class="content">
				<div class="container">
             
					<div class="row">
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
						<div class="col-lg-8 col-md-12">

							@if(count($blogs) > 0)
							@foreach($blogs as $blog)
							<!-- Blog Post -->
							<div class="blog">
								<div class="blog-image">
									<a href="{{asset('assets/img/blog/'.$blog->b_image)}}"><img class="img-fluid" src="{{asset('assets/img/blog/'.$blog->b_image)}}" alt="Post Image"></a>
								</div>
								<h3 class="blog-title"><a href="/blog/{{$blog->b_title}}">{{$blog->b_title}}</a></h3>
								<div class="blog-info clearfix">
									<div class="post-left">
										<ul>
											<li>
												<div class="post-author">
													<a href="{{asset('assets/img/obsimage/'.$blog->image)}}"><img src="{{asset('assets/img/obsimage/'.$blog->image)}}" alt="Post Author"> <span>{{$blog->name}}</span></a>
												</div>
											</li>
											<li><i class="far fa-clock"></i>{{date('d M Y', strtotime($blog->created_at))}}</li>
											<li><i class="far fa-comments"></i>
												@if($blog->b_comment == 0)
												{{$blog->b_comment}} Comment
												@elseif($blog->b_comment == 1)
												{{$blog->b_comment}} Comment
												@else
												{{$blog->b_comment}} Comments
												@endif
											</li>
											<li><i class="fa fa-tags"></i>{{$blog->category_name}}</li>
										</ul>
									</div>
								</div>
								<div class="blog-content">
									<p>{!! shorter($blog->b_content, 250) !!}</p>
									<a href="/blog/{{$blog->b_title}}" class="read-more">Read More</a>
								</div>
							</div>
							<!-- /Blog Post -->


							@endforeach
							@else
							<center><h1>NO RECORD FOUND</h1></center>
							@endif

							
							

						

							<!-- Blog Pagination -->
							<div class="row">
								<div class="col-md-12">
									<div class="blog-pagination">
										{{$blogs->links()}}
									</div>
								</div>
							</div>
							<!-- /Blog Pagination -->
							
						</div>
						
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
