				<div class="card search-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control" name="search_cds" id="search_cds">
										
										</div>
									</form>

									<div style="margin-top: 5px;">
										<ul class="latest-posts" id="cds_search_output">

									
										
										
									</ul>
									</div>
								</div>
							</div>


		<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-header">
									<h4 class="card-title">Latest Project</h4>
								</div>
								<div class="card-body">
									<ul class="latest-posts">
										@if(count($cds_sides) > 0)

										@foreach($cds_sides as $cds_side)

										<li>
											<div class="post-thumb">
												<a href="/cds/{{$cds_side->project_topic}}/{{$cds_side->cds_project_id}}">
													<img class="img-fluid" src="{{ asset('assets/img/cdsimage/'.$cds_side->project_image) }}" alt="">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="/cds/{{$cds_side->project_topic}}/{{$cds_side->cds_project_id}}">{{$cds_side->project_topic}}</a>
												</h4>
												<p>{{date('d M Y', strtotime($cds_side->project_to_date))}}</p>
											</div>
										</li>
										@endforeach

										@else


										@endif
										
										
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->