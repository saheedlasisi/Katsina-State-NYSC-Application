<!-- Search -->
							<div class="card search-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control" name="search_blog" id="search_blog">
										
										</div>
									</form>

									<div style="margin-top: 5px;">
										<ul class="latest-posts" id="blog_search_output">

									
										
										
									</ul>
									</div>
								</div>
							</div>
							<!-- /Search -->

							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Posts</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">

										@if(count($blog_sides) > 0)
										@foreach($blog_sides as $blog_side)
										<li>
											<div class="post-thumb">
												<a href="/blog/{{$blog_side->b_title}}">
													<img class="img-fluid" src="{{ asset('assets/img/blog/'.$blog_side->b_image)}}" alt="">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="/blog/{{$blog_side->b_title}}">{{$blog_side->b_title}}</a>
												</h4>
												<p>{{date('d M Y', strtotime($blog_side->created_at))}}</p>
											</div>
										</li>
										@endforeach
										@else

										@endif
										
										
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

					

						