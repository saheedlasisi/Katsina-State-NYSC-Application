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
<!-- <span id="online_status">
	
</span> -->
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
									

									
										<div class="clinic-booking">
										
										<a class="apt-btn" href="/editmyprofile/{{$user->name}}/{{$user->id}}">Profile Settings</a>
									</div>
										






									<div class="clinic-booking">

										
									

									
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
										<a class="nav-link" href="#doc_locations" data-toggle="tab"> @if(count($friends) > 1) <div class="badge badge-success badge-pill"> {{count($friends)}}</div> Friends @else <div class="badge badge-success badge-pill"> {{count($friends)}}</div> Friend @endif</a>
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

									<li class="nav-item">
										<a class="nav-link" href="#history" data-toggle="tab">History @if(count($count_call) + count($count_what) + count($order) > 0)<span><div class="badge badge-danger badge-pill" > {{count($count_call) + count($count_what) + count($order)}}</div></span> @else @endif  </a>
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
												<p>{!! $user->about_me!!}</p>
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
					<div class="doc-info-right"><div class="clinic-booking">
						<a class="view-pro-btn" href="/corpsmemberprofile/{{$friend->receiver_name}}/{{$friend->receiver_id}}">View Profile</a>
						<a class="view-pro-btn" href="javascript:void(0);" style="color: red;" data-id="{{$friend->request_id}}" id="unfriend_btn">UnFriend</a>
						

					</div>
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
					<div class="doc-info-right"><div class="clinic-booking">
						<a class="view-pro-btn" href="/corpsmemberprofile/{{$friend->sender_name}}/{{$friend->sender_id}}">View Profile</a>
						<a class="view-pro-btn" href="javascript:void(0);" style="color: red;" data-id="{{$friend->request_id}}" id="unfriend_btn">UnFriend</a>
					</div>
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
								<center><h6>NO RECORD FOUND</h6></center>
								@else

								@endif
								
									</div>							
						
		</div>
		<!-- /Reviews Content -->








								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
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

													<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Shop Account Status:  {{$shop->shop_account_status}}</p>
	
													</div>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clinic-booking">
												<a class="view-pro-btn" href="/myshop/{{$shop->shop_name}}/{{$shop->shop_id}}">View Details</a>
												<a class="apt-btn" href="/editshop/{{$shop->shop_name}}/{{$shop->shop_id}}">Edit Shop</a>
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





<!-- Business Hours Content -->
		<div role="tabpanel" id="history" class="tab-pane fade">
		
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Orders  @if(count($order) > 0) <span><div class="badge badge-danger badge-pill"> {{count($order)}}</div></span> @else @endif</a> </li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab" id="clear_call_status_btn">Call  @if(count($count_call) > 0) <span><div class="badge badge-danger badge-pill"> {{count($count_call)}}</div></span> @else @endif</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab" id="clear_whatsapp_status_btn">Whatsapp  @if(count($count_what) > 0) <span><div class="badge badge-danger badge-pill"> {{count($count_what)}}</div></span> @else @endif</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane show active" id="solid-tab1">
						<!-- Awards Details -->
		<div class="widget awards-widget">
			<h4 class="widget-title">Your Order(s)</h4>
			<div class="experience-box">
				
													
			<ul class="experience-list">
			@if(count($orders) > 0)
			@foreach($orders as $order)
			<li>
				<div class="experience-user">
					<div class="before-circle"></div>
	</div>
				<div class="experience-content">
		<div class="timeline-content">
		<p class="exp-year"> {{\Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</p>
		<h4 class="exp-title">Shop :<a href="/shop/{{$order->shop_name}}/{{$order->shop_id}}">{{$order->shop_name}}</a></h4>
		<h4 class="exp-title">Name :<a href="/product/{{$order->product_name}}/{{$order->shop_product_id}}">{{$order->product_name}}</a></h4>
		<h4 class="exp-title">Unit Price :{{number_format($order->product_price)}}</h4>
		<h4 class="exp-title">Qty :{{$order->quantity}}</h4>
		<h4 class="exp-title">Total :{{number_format($order->product_price * $order->quantity)}}</h4>
		<h4 class="exp-title">Deadline :{{date('d-M-Y', strtotime($order->period))}}</h4>
		@if($order->order_status == 'completed')
		<h4 class="exp-title">Order Status :{{$order->order_status}}, <a href="/orderreceipt/{{$order->order_id}}/{{$order->seller_id}}/{{$order->product_id}}/{{$order->shop_id}}/{{$order->buyer_id}}"><i class="fa fa-print"></i> Receipt</a></h4>
		@else
		@endif
		
	@if($order->seller_order_status == 'completed' AND $order->buyer_order_status == 'pending')
		<h4 class="exp-title">Seller claimed this order has been completed, click yes to finally complete the order <a href="#" class="btn btn-success btn-sm" id="order_yes_btn" data-id="{{$order->order_id}}" data-shop="{{$order->shop_id}}" data-product="{{$order->product_id}}">Yes</a></h4>
		@else
		@endif
				
			</div>
		</div>
		<hr/>
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
			<div class="tab-pane" id="solid-tab2">
	<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title"> Call Attempts</h4>
						<div class="experience-box">
													
							<ul class="experience-list">
							@if(count($calls) > 0)
							@foreach($calls as $call)
							@if($call->caller_id == auth()->user()->id)
<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
							<div class="timeline-content">
		<p class="exp-year"> {{\Carbon\Carbon::parse($call->time_called)->diffForHumans()}}</p>
<h4 class="exp-title"> You attempted calling, <a href="/corpsmemberprofile/{{$call->receiver_name}}/{{$call->receiver_id}}">{{$call->receiver_name}}</a></h4>
<h6>{{$call->receiver_number}} <a href="tel:{{$call->receiver_number}}" class="btn btn-white call-btn" data-id="{{$call->receiver_id}}" id="call_user_btn"> <i class="fas fa-phone"></i> </a> </h6>
						</div>
					</div>
				</li>
							@else

							<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
							<div class="timeline-content">
		<p class="exp-year"> {{\Carbon\Carbon::parse($call->time_called)->diffForHumans()}}</p>
<h4 class="exp-title"><a href="/corpsmemberprofile/{{$call->caller_name}}/{{$call->caller_id}}"> {{$call->caller_name}}</a>, attempted calling you</h4>
<h6>{{$call->caller_number}} <a href="tel:{{$call->caller_number}}" class="btn btn-white call-btn" data-id="{{$call->caller_id}}" id="call_user_btn"> <i class="fas fa-phone"></i> </a> </h6>
						</div>
					</div>
				</li>

							@endif
							
				@endforeach
				@else
				<center><h6>NO RECORD FOUND</h6></center>
				@endif
			</ul>
													
		</div>
	</div>
	<!-- /Awards Details -->
			</div>
			<div class="tab-pane" id="solid-tab3">
							<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title"> Whatsapp Attempts</h4>
						<div class="experience-box">
													
							<ul class="experience-list">
							@if(count($whats) > 0)
							@foreach($whats as $what)
							@if($what->sender_id == auth()->user()->id)
<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
							<div class="timeline-content">
		<p class="exp-year"> {{\Carbon\Carbon::parse($what->time_sent)->diffForHumans()}}</p>
<h4 class="exp-title"> You attempted messaging, <a href="/corpsmemberprofile/{{$what->receiver_name}}/{{$what->receiver_id}}">{{$what->receiver_name}}</a> through whatsapp</h4>
<h6>{{$what->receiver_number}} <a href="https://wa.me/{{$what->receiver_whatsapp}}?text={{ urlencode('Hi, i am '.$what->sender_name)}}" class="btn btn-white call-btn" data-id="{{$what->receiver_id}}" id="call_whatsapp_btn">
<i class="fab fa-whatsapp"></i></a></h6>
						</div>
					</div>
				</li>
							@else

							<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
							<div class="timeline-content">
		<p class="exp-year"> {{\Carbon\Carbon::parse($what->time_sent)->diffForHumans()}}</p>
<h4 class="exp-title"><a href="/corpsmemberprofile/{{$what->sender_name}}/{{$what->sender_id}}"> {{$what->sender_name}}</a>, attempted messaging you through whatsapp</h4>
<h6>{{$what->sender_number}}  <a href="https://wa.me/{{$what->sender_whatsapp}}?text={{ urlencode('Hi, i am '.$what->receiver_name)}}" class="btn btn-white call-btn" data-id="{{$what->sender_id}}" id="call_whatsapp_btn">
<i class="fab fa-whatsapp"></i></a></h6>
						</div>
					</div>
				</li>

							@endif
							
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
		<!-- /Business Hours Content -->
								








								
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