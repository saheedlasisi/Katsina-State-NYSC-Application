@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$user_name}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->


			<!-- Page Content -->
<div class="content">
	<div class="container">

		<!-- Doctor Widget -->
		<div class="card">
			<div class="card-body">
				<div class="doctor-widget">
					<div class="doc-info-left">
						<div class="doctor-img">
							@foreach($users as $user)
							<div id="show_date">
								
							</div>
							<input type="hidden" name="corper_id" id="corper_id" value="{{$user->id}}">
	<img src="{{asset('assets/img/corperimage/'.$user->profile_pic) }}" class="img-fluid" alt="User Image" style="border-radius: 40px;">


</div>
<div class="doc-info-cont">
<h4 class="doc-name">{{$user->name}}</h4>
<p class="doc-speciality"><b>Batch:</b> {{$user->batch}}, <b>Stream:</b> {{$user->stream}}, <b>Year:</b> {{$user->year}}<br> <b>Gender:</b> {{$user->gender}}, <b>Marital Status: </b>{{$user->marital_status}}<br>
<b>Platoon:</b> {{$user->platoon}}, <b>Religion:</b> {{$user->religion}}, <i class="fas fa-map-marker-alt"></i> <b>From:</b> {{$user->state}} <br />
<span id="online_status">
	
</span>
<input type="hidden" name="" id="chatuser_id" value="{{$user->id}}">
<input type="hidden" name="" id="sender_id" value="{{auth()->user()->id}}">
<!-- <input type="hidden" name="" id="reciver_image" value="{{$user->profile_pic}}"> -->

</p>
<div class="clinic-details">
<p class="doc-location"><i class="fas fa-map-marker-alt"></i> @if((date('Y') - $user->year) > 0 ) 
<b>Served in:</b> {{$user->serving_lga}}
@else
<b>Serving in:</b> {{$user->serving_lga}}
@endif 
</p>
<ul class="clinic-gallery">
	@if(count($photos) > 0 )

	@foreach($photos as $photo)
<li>
<a href="{{asset('assets/img/corperimage/'.$photo->photo) }}" data-fancybox="gallery">
		<img src="{{asset('assets/img/corperimage/'.$photo->photo) }}" alt="Feature">
	</a>
</li>
	@endforeach

	@else

	@endif
	</ul>
</div>
		<div class="clinic-services">
			<span>Account Status: 

				@if($user->account_status == 'verified')
			<i class="fas fa-user" style="color: darkgreen;"></i>  <font color="darkgreen"><b>{{$user->account_status}}</b></font>
				@else
				<i class="fas fa-ban" style="color: red;"></i>  <font color="red"><b>{{$user->account_status}}</b></font>
				@endif
			</span>
			
		</div>
	</div>
</div>
<div class="doc-info-right">
	<div class="clini-infos">
		<ul>
			<li><i class="fas fa-users"></i>  @if(count($friends) > 1) {{count($friends)}} Friends @else {{count($friends)}} Friend @endif </li>
			
		</ul>
	</div>
									

										@if(count($wearefriends) > 0)
										@foreach($wearefriends as $we)
										@if($we->request_status == 1)
										<div class="doctor-action">
										
										<a href="javascript:void(0);" class="btn btn-white msg-btn" data-id="{{$user->id}}"  data-name="{{$user->name}}" data-image="{{$user->profile_pic}}" id="chatuser">
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="tel:{{$user->phone_number}}" class="btn btn-white call-btn" data-id="{{$user->id}}" id="call_user_btn"> <i class="fas fa-phone"></i> </a>

										<a href="https://wa.me/{{$user->whatsapp_number}}?text={{ urlencode('Hi, i am '.auth()->user()->name)}}" class="btn btn-white call-btn" data-id="{{$user->id}}" id="call_whatsapp_btn">
										<i class="fab fa-whatsapp"></i></a>

										<a href="https://facebook.com/{{$user->facebook_id}}" class="btn btn-white msg-btn">
											<i class="fab fa-facebook-square"></i>
										</a>
									</div>
										@else
										@endif
										@endforeach
										@else
										@endif






									<div class="clinic-booking">

										@if(count($wearefriends) > 0)
										@foreach($wearefriends as $we)
										@if($we->request_status == 1)
										<center><a class="apt-btn" href="javascript:void(0);" style="width: 160px; background: red; border: red;" data-id="{{$we->f_r_id}}" id="unfriend_btn"><i class="fas fa-minus"></i> UnFriend</a></center>
										@elseif($we->request_status == 0 AND $we->receiver_id == auth()->user()->id)

										<center><a class="apt-btn" href="javascript:void(0);" style="width: 150px; background: lightgreen; border: lightgreen;" data-id="{{$we->f_r_id}}" id="accept_request_btn"><i class="fas fa-plus"></i> Accept</a>
											<a class="apt-btn" href="javascript:void(0);" style="width: 160px; background: red; border: red;" data-id="{{$we->f_r_id}}" id="decline_request_btn"><i class="fas fa-minus"></i> Decline</a></center>
										@else
										<center><a class="apt-btn" href="javascript:void(0);" style="width: 200px; background: red; border: red;" data-id="{{$we->f_r_id}}" id="cancel_request_btn"><i class="fas fa-trash"></i> Cancel Request</a></center>

										@endif
										@endforeach
										@else

										<center><a class="apt-btn" href="javascript:void(0);" style="width: 100px; background: lightgreen; border: lightgreen;" data-id="{{$user->id}}" id="send_request_btn"><i class="fas fa-plus"></i> Add</a></center>

										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab"> @if(count($friends) > 1) {{count($friends)}} Friends @else {{count($friends)}} Friend @endif</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">CDS project</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">SAED</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#shop" data-toggle="tab">Shop ({{count($shops)}})</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												{!! $user->about_me!!}
											</div>
											<!-- /About Details -->
										
<!-- Education Details -->
<div class="widget education-widget">
	<h4 class="widget-title">Education</h4>
	<div class="experience-box">
		<ul class="experience-list">

			@if(count($education) > 0)
			@foreach($education as $edu)
			<li>
				<div class="experience-user">
					<div class="before-circle"></div>
				</div>
				<div class="experience-content">
					<div class="timeline-content">
						<a href="#/" class="name">{{$edu->school_name}}</a>
					<div>{{strtoupper($edu->type)}}</div>
<span class="time">{{date('Y', strtotime($edu->from_date))}} - {{date('Y', strtotime($edu->to_date))}} </span>
							</div>
						</div>
					</li>
					@endforeach
					@else
						<center><h6>NO RECORD FOUND</h6></center>

					@endif
														
				</ul>
			</div>
		</div>
		<!-- /Education Details -->
									
				<!-- Experience Details -->
				<div class="widget experience-widget">
					<h4 class="widget-title">Work & Experience</h4>
					<div class="experience-box">
						<ul class="experience-list">
							@if(count($works) > 0)
							@foreach($works as $work)
							<li>
					<div class="experience-user">
					<div class="before-circle"></div>
					</div>
					<div class="experience-content">
						<div class="timeline-content">
					<a href="#/" class="name">{{$work->w_title}}</a>
				<span class="time">{{date('Y', strtotime($work->w_from_date))}} - <?php if(date('Y', strtotime($work->w_to_date)) == date('Y', strtotime($work->w_from_date)) ){

					$to_date = date('Y', strtotime($work->w_to_date)) - date('Y', strtotime($work->w_from_date));
					if ($to_date > 1) {
						echo 'Present ('.$to_date.' years)';
					}else{
					echo 'Present ('.$to_date.' year)';

					}

					}else{

				$to_date2 = date('Y', strtotime($work->w_to_date))- date('Y', strtotime($work->w_from_date));
					if ($to_date2 > 1) {
						echo date('Y', strtotime($work->w_to_date)).' ('.$to_date2.' years)';
					}else{
					echo date('Y', strtotime($work->w_to_date)).' ('.$to_date2.' year)';

					}


					}?></span>
						</div>
					</div>
				</li>
					@endforeach
				@else
					<center><h6>NO RECORD FOUND</h6></center>
				@endif
					</ul>
				</div>
			</div>
			<!-- /Experience Details -->
								
	<!-- Awards Details -->
	<div class="widget awards-widget">
		<h4 class="widget-title">Awards</h4>
		<div class="experience-box">
			<ul class="experience-list">
				@if(count($awards) > 0)
				@foreach($awards as $award)
				<li>
					<div class="experience-user">
						<div class="before-circle"></div>
					</div>
					<div class="experience-content">
						<div class="timeline-content">
	<p class="exp-year">{{date('M Y', strtotime($award->award_date))}}</p>
	<h4 class="exp-title">{{$award->award_name}}</h4>
	{!! $award->award_detail !!}
			</div>
		</div>
	</li>

	@endforeach

	@else
	<center><h6>NO RECORD FOUND</h6></center>

	@endif
														
		</ul>
	</div>
</div>
		<!-- /Awards Details -->







		<!-- Awards Details -->
	<div class="widget awards-widget">
		<h4 class="widget-title">Specializations</h4>
		<div class="experience-box">
			<ul class="experience-list">
				@if(count($skills) > 0)
					@foreach($skills as $skill)
				<li>
					<div class="experience-user">
						<div class="before-circle"></div>
					</div>
					<div class="experience-content">
						<div class="timeline-content">
	
	<h4 class="exp-title">{{$skill->skill_name}}</h4>

			</div>
		</div>
	</li>

	@endforeach

	@else
	<center><h6>NO RECORD FOUND</h6></center>

	@endif
														
		</ul>
	</div>
</div>
		<!-- /Awards Details -->





											
		

			</div>
		</div>
	</div>
		<!-- /Overview Content -->
								
		<!-- Locations Content -->
		<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
			<!-- Location List -->
				<div class="card-body">


					@if(count($friends) > 0)

				<div>
				<!-- Doctor Widget -->
@foreach($friends as $friend)
	@if($friend->sender_id == $user->id)

	<div class="card">
	<div class="card-body">
		<div class="doctor-widget">
			<div class="doc-info-left">
				<div class="doctor-img">
					<a href="/corpsmemberprofile/{{$friend->receiver_name}}/{{$friend->receiver_id}}">
						<img src="/assets/img/corperimage/{{$friend->receiver_image}}" class="img-fluid" alt="User Image" style="border-radius: 20px;"></a>
					</div>
					<div class="doc-info-cont">
						<h4 class="doc-name"><a href="/corpsmemberprofile/{{$friend->receiver_name}}/{{$friend->receiver_id}}"> {{$friend->receiver_name}}</a></h4>
						<p class="doc-speciality">Batch: {{$friend->receiver_batch}}, Stream: {{$friend->receiver_stream}}, Year: {{$friend->receiver_year}}</p>
						<div class="clinic-details"><p class="doc-location"><i class="fas fa-map-marker-alt"></i> From: {{$friend->receiver_state}}</p>
						</div>
					</div></div>
					<div class="doc-info-right"><div class="clinic-booking"><a class="view-pro-btn" href="/corpsmemberprofile/{{$friend->receiver_name}}/{{$friend->receiver_id}}">View Profile</a></div>
				</div>
			</div>
		</div></div>
	@elseif($friend->receiver_id == $user->id)

<div class="card">
	<div class="card-body">
		<div class="doctor-widget">
			<div class="doc-info-left">
				<div class="doctor-img">
					<a href="/corpsmemberprofile/{{$friend->sender_name}}/{{$friend->sender_id}}'">
						<img src="/assets/img/corperimage/{{$friend->sender_image}}" class="img-fluid" alt="User Image" style="border-radius: 20px;"></a>
					</div>
					<div class="doc-info-cont">
						<h4 class="doc-name"><a href="/corpsmemberprofile/{{$friend->sender_name}}/{{$friend->sender_id}}"> {{$friend->sender_name}}</a></h4>
						<p class="doc-speciality">Batch: {{$friend->sender_batch}}, Stream: {{$friend->sender_stream}}, Year: {{$friend->sender_year}}</p>
						<div class="clinic-details"><p class="doc-location"><i class="fas fa-map-marker-alt"></i> From: {{$friend->sender_state}}</p>
						</div>
					</div></div>
					<div class="doc-info-right"><div class="clinic-booking"><a class="view-pro-btn" href="/corpsmemberprofile/{{$friend->sender_name}}/{{$friend->sender_id}}">View Profile</a></div>
				</div>
			</div>
		</div></div>
	@else


	@endif

						@endforeach
	<!-- DoctorWidget -->
	</div>

	@else

	<center><h6>NO RECORD FOUND</h6></center>

	@endif
			
	</div>

			</div>
			<!-- /Locations Content -->

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
								
			<!-- Reviews Content -->
			<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
				<div class="row blog-grid-row">

								@if(count($cds) > 0 )
								@foreach($cds as $cd)
<div class="col-md-4 col-sm-6">
								
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
								<center><h6>NO RECORD FOUND</h6></center>
								@endif
								
									</div>						
									
						
			</div>
			<!-- /Reviews Content -->
								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">




					<div class="row row-grid">

						@if(count($saeds) > 0)
						@foreach($saeds as $saed)
				<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="/saed/{{$saed->saed_title}}/{{$saed->session_id}}" class="booking-doc-img">
														<img src="{{asset('assets/img/saedimage/'.$saed->image) }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="/saed/{{$saed->saed_title}}/{{$saed->session_id}}">{{$saed->saed_title}}</a></h3>
														
														<div class="patient-details">
												
															<h5 class="mb-0"><i class="fas fa-map-home"></i> {{$saed->session_year}}, Batch: {{$saed->session_batch}}, Stream: {{$saed->session_stream}}</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													
													<li><i class="fa fa-users" style="color: lightgreen; font-size: 30px;"></i> <span>{{$saed->member}}</span></li>
													<li><center><a href="/saed/{{$saed->saed_title}}/{{$saed->session_id}}" class="btn btn-success">Enter</a></center></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
						@endforeach
						@else 

<center><h6>NO RECORD FOUND</h6></center>
						@endif
								
								
								
							</div>





						
								</div>
								<!-- /Business Hours Content -->




<!-- Locations Content -->
		<div role="tabpanel" id="shop" class="tab-pane fade">
								
			<!-- Location List -->
				<div class="card-body">

					@if(count($shops) > 0)
						@foreach($shops as $shop)
					<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img1">
												<a href="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}">
													<img src="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name mb-2"><a href="pharmacy-details.html">{{$shop->shop_name}}</a></h4>
												<div class="rating mb-2">
									<?php  

											$like = $shop->shop_like;
											$view = $shop->shop_view;

											$total = $like + $view;

											$rate = $total / 5;

											if ($rate > 0 && $rate < 1) {

											echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 1) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 1 && $rate < 2) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 2 ) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 2 && $rate < 3) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 3) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 3 && $rate < 4) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 4) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 4 && $rate < 5) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate >= 5) {
												echo '<span class="badge badge-primary">5</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
											}else{


											}

											?>
										
											<span class="d-inline-block average-rating">({{$shop->shop_like + $shop->shop_view}})</span>
												</div>
												<div class="clinic-details">
													<div class="clini-infos pt-3">
												
													<p class="doc-location mb-2"><i class="fas fa-phone-volume mr-1"></i> {{$shop->shop_phone_number}}</p>
													<p class="doc-location mb-2 text-ellipse"><i class="fas fa-map-marker-alt mr-1"></i> {{$shop->shop_address}} </p>
													<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> {{$shop->shop_specialist}}</p>
													
													<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Opens at {{$shop->shop_open_hour}}</p>

													<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Close at  {{$shop->shop_closing_hour}}</p>
	
													</div>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clinic-booking">
												<a class="view-pro-btn" href="/shop/{{$shop->shop_name}}/{{$shop->shop_id}}">View Details</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Doctor Widget -->
							@endforeach
							@else
							<center><h6>NO SHOP FOUND</h6></center>

							@endif	
		
			
	</div>

			</div>
			<!-- /Locations Content -->














								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
   @endforeach



@include('inc.chatuser')
@endsection