@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Market</a></li>
									<li class="breadcrumb-item active" aria-current="page">Shop</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$shop_name}}</h2>
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
									<div class="doctor-img1">
										<a href="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}">
											<img src="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}" class="img-fluid" alt="User Image">
										</a>
									</div>
									<br />
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

											<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Working Days:   {{$shop->shop_working_days}}</p>

											@foreach($ownby as $by)

											<p class="doc-location mb-2"><i class="fas fa-user"></i> Own by: <a href="/corpsmemberprofile/{{$by->name}}/{{$by->id}}">{{$by->name}}</a></p>
											@endforeach
										
										</div>
										</div>
									</div>
								</div>
								<div class="doc-info-right d-flex align-items-center justify-content-center">
									<div class="clinic-booking">
										<a class="view-pro-btn" href="javascript:void(0);" id="send_shop_message_btn">Send Message</a>
										<a class="apt-btn" href="tel:{{$shop->shop_phone_number}}" id="call_shop_btn" data-id="{{$shop->shop_id}}">Call Now</a>

										@if(count($shoplike) > 0)
										<a href="javascript:void(0);" class="view-pro-btn" data-id="{{$shop->shop_id}}" id="unlike_shop_btn" style="color: red;"><i class="far fa-thumbs-down"></i> UnLike</a>
										@else
										<a href="javascript:void(0);" class="view-pro-btn" data-id="{{$shop->shop_id}}" id="like_shop_btn"><i class="far fa-thumbs-up"></i> Like</a>
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
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Products</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">History</a>
									</li>
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Shop</h4>
											{!! $shop->about_shop !!}
											</div>
											<!-- /About Details -->
										
										
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
																	<p class="exp-year"> {{date('M Y', strtotime($award->shopaward_date))}}</p>
																	<h4 class="exp-title">{{$award->shopaward_name}}</h4>
																	{!! $award->shopaward_detail !!}
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
								
										
									@if(count($products) > 0)
									<div class="row">
									@foreach($products as $pro)
									<div class="col-md-12 col-lg-4 col-xl-4 product-custom">
										<div class="profile-widget">
										<div class="doc-img">
										<a href="/product/{{$pro->product_name}}/{{$pro->shop_product_id}}" tabindex="-1">
											<img class="img-fluid" alt="Product image" src="/assets/img/shopimage/{{$pro->product_image}}"></a><a href="javascript:void(0)" class="fav-btn" tabindex="-1"><i class="far fa-bookmark"></i></a></div><div class="pro-content"> <font size="4"><a href="/product/{{$pro->product_name}}/{{$pro->shop_product_id}}" tabindex="-1">{{$pro->product_name}}</a></font><div class="row align-items-center"><div class="col-lg-6"><span class="price"><s>N</s>{{number_format($pro->current_price)}}</span> <br /><span class="price-strike">N{{number_format($pro->old_price)}}</span></div><div class="col-lg-6 text-right"><a href="javascript:void(0)" class="cart-icon" style="font-weight: 700;" id="cart_btn" data-id="{{$pro->shop_product_id}}" data-name="{{$pro->product_name}}" data-status="{{$pro->product_status}}" data-current="{{$pro->current_price}}" data-old="{{$pro->old_price}}" data-qty="{{$pro->product_qty}}"><i class="fas fa-shopping-cart" ></i> </a></div></div></div></div></div>
									@endforeach
									</div>
									@else

									<center><h6>NO RECORD FOUND</h6></center>
									@endif

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
					<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list" id="review_list">
										
										
											
											
											
											
										</ul>
										
									
										
									</div>
									<!-- /Review Listing -->
								
									<!-- Write Review -->
						<div class="write-review">
					<h4>Write a review for <strong>{{$shop_name}}</strong></h4>
										
										<!-- Write Review Form -->
					<form>
						<input type="hidden" name="shop_id" id="shop_id" value="{{$shop->shop_id}}">
						 {{ csrf_field() }}
					<div class="form-group">
					<label>Review Star</label>
					<select class="form-control" name="review_star" id="review_star">
						<option value="">Select Review Rating Star</option>
						<option value="1">1 Star</option>
						<option value="2">2 Stars</option>
						<option value="3">3 Stars</option>
						<option value="4">4 Stars</option>
						<option value="5">5 Stars</option>
					</select>
					<div class="rating" id="review_star_preview">
					
				</div>
				</div>
				<div class="form-group">
					<label>Title of your review</label>
					<input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?" name="review_title" id="review_title">
				</div>
				<div class="form-group">
				<label>Your review</label>
				<textarea id="review_content" name="review_content" class="form-control"></textarea>
				<div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">Breaking Down</span> your review[i.e text] will make it comes out in a perfect way, Thank you.</small></div>
											  
				<hr>
				
				<div class="submit-section">
					<button class="btn btn-primary submit-btn" id="add_review_btn" data-id="{{$shop->shop_id}}">Add Review</button>
				</div>
			</form>
			<!-- /Write Review Form -->
										
		</div>
		<!-- /Write Review -->
						
	</div>
	<!-- /Reviews Content -->
						
			</div>						<!-- Business Hours Content -->
		<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
		
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Orders</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Messages</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab">Calls</a></li>
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
												<h4 class="widget-title">Your Messages With Them</h4>
												<div class="experience-box">
													
														<ul class="experience-list">
														@if(count($messages) > 0)
														@foreach($messages as $message)
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year"> {{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</p>
																	<h4 class="exp-title">{{$message->shop_message_subject}}</h4>
																	{{ $message->shop_message_content }}
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




			<div class="tab-pane" id="solid-tab3">
					<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title">Your Call Attempts</h4>
						<div class="experience-box">
													
							<ul class="experience-list">
							@if(count($calls) > 0)
							@foreach($calls as $call)
							<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
									<div class="timeline-content">
										<p class="exp-year"> {{\Carbon\Carbon::parse($call->created_at)->diffForHumans()}}</p>
							<h4 class="exp-title"></h4>
							<!-- // -->
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

		<!-- /Business Hours Content -->
								



					</div>
				</div>
			</div>
			<!-- /Doctor Details Tab -->

		</div>
	</div>		
	<!-- /Page Content -->
   

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace('review_content');
  
</script>
<script type="text/javascript">
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();
		$('body').delegate('#like_shop_btn', 'click', function(e){

    e.preventDefault();
    var shop_id = $(this).data('id');

      if (confirm('Are you sure?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.likeshop')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
       $('.overlay').hide();
    
      
    }


  })

  }

  });







		$('body').delegate('#unlike_shop_btn', 'click', function(e){

    e.preventDefault();
    var u_shop_id = $(this).data('id');

      if (confirm('Are you sure?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.unlikeshop')}}",
    method:"POST",
    data:{u_shop_id:u_shop_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
       $('.overlay').hide();
    
      
    }


  })

  }

  });


  $("#review_star").bind("change keyup", function(event){
    var review_star = $(this).val();

    if (review_star == 1) {
   var review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#review_star_preview').html(review_star_preview);

    }else if (review_star == 2) {
    	var review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#review_star_preview').html(review_star_preview);

    }else if (review_star == 3) {
    	var review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#review_star_preview').html(review_star_preview);

    }else if (review_star == 4) {
    	var review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
   $('#review_star_preview').html(review_star_preview);

    }else if (review_star == 5) {
    	var review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
   $('#review_star_preview').html(review_star_preview);

    }else{

    var review_star_preview = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#review_star_preview').html(review_star_preview);

    }
    

  });


	$('body').delegate('#add_review_btn', 'click', function(e){
     for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}
    e.preventDefault();
    var review_shop_id = $(this).data('id');
    var review_star = $('#review_star').val();
    var review_content = $('#review_content').val();
    var review_title = $('#review_title').val();

    if (review_star == '') {
    	alert("Select Star");
    }else if (review_title == '') {
    	alert("Enter Title");
    }else if (review_content == '') {
    	alert("Enter Content");
    }else{

    	if (confirm("Are you sure?")) {
$('.overlay').show();
    		  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addreview')}}",
    method:"POST",
    data:{review_shop_id:review_shop_id,review_star:review_star,review_content:review_content,review_title:review_title,_tokens:_tokens },
    success:function(data){

    //console.log(data)
    alert(data);
getReviews();
  $('#review_star').val('');
     CKEDITOR.instances['review_content'].setData('');
   $('#review_title').val('');
   
       $('.overlay').hide();
    
      
    }


  })

    	}


    }
    
    

 
  });



getReviews();
function getReviews(){

var shop_id = $('#shop_id').val();

 		  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.getreview')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens },
    success:function(data){

    //console.log(data)

$('#review_list').empty();
        if (data == '') {
$('#review_list').empty();
          var review_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#review_list').append(review_list);

        }else{

             $('#review_list').empty();
     $.each(data, function(i, value){


    if (value.review_star == 1) {
   var star = '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.review_star == 2) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.review_star == 3) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.review_star == 4) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

    }else if (value.review_star == 5) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';

    }else{

    }


    var my_id = <?php echo auth()->user()->id?>;

    if (value.user_id == my_id) {
    	var tool = 'data-id="'+value.shop_review_id+'" id="delete_my_shop_review"';
    }else{

    	var tool = '';

    }

var review_list = '<li '+tool+'><div class="comment"><img class="avatar avatar-sm rounded-circle" alt="User Image" src="/assets/img/corperimage/'+value.profile_pic+'"><div class="comment-body"><div class="meta-data"><span class="comment-author">'+value.name+'</span><span class="comment-date">Reviewed '+jQuery.timeago(value.time_created)+'</span><div class="review-count rating">'+star+'</div></div><p class="recommended"> '+value.review_title+'</p><p class="comment-content">'+value.review_content+'</p><div class="comment-reply"><a class="comment-btn" href="javascript:void(0)" data-id="'+value.shop_review_id+'" id="review_reply_btn"><i class="fas fa-reply"></i> Reply</a> <a class="btn btn-primary btn-sm" href="javascript:void(0)" data-id="'+value.shop_review_id+'" id="load_reply_btn"><i class="fas fa-pen"></i> Load Replies</a> &nbsp;<p class="recommend-btn"><span>Recommend?</span><a href="javascript:void(0)" class="like-btn" data-id="'+value.shop_review_id+'" id="shop_review_yes_btn"><i class="far fa-thumbs-up"></i> Yes '+value.review_yes+'</a> <a href="javascript:void(0)" class="dislike-btn" data-id="'+value.shop_review_id+'" id="shop_review_no_btn"><i class="far fa-thumbs-down"></i> No '+value.review_no+'</a></p></div></div></div> <ul class="comments-reply" id="sub_review_list"> </ul></li>';

    $('#review_list').append(review_list);



      });
   
       
    }
      
    }


  })


}




$('body').delegate('#delete_my_shop_review', 'dblclick', function(e){

    e.preventDefault();


    var r_id = $(this).data('id');
    

      if (confirm('Do you want to delete this?')) {
      
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletemyshopreview')}}",
    method:"POST",
    data:{r_id:r_id,_tokens:_tokens},
    success:function(data){

//console.log(data)
    // alert(data);

    getReviews();
    
      
    }


  })

  }

  });	




$('body').delegate('#load_reply_btn', 'click', function(e){

    e.preventDefault();
    var r_shop_id = $(this).data('id');


    loadReply();
    function loadReply(){
    	    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.loadreply')}}",
    method:"POST",
    data:{r_shop_id:r_shop_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)

       $('#sub_review_list').empty();
        if (data == '') {
$('#sub_review_list').empty();
          var sub_review_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#sub_review_list').append(sub_review_list);

        }else{

             $('#sub_review_list').empty();
     $.each(data, function(i, value){


    if (value.reply_review_star == 1) {
   var star = '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.reply_review_star == 2) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.reply_review_star == 3) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

    }else if (value.reply_review_star == 4) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

    }else if (value.reply_review_star == 5) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';

    }else{

    }




var sub_review_list = '<li><div class="comment"><img class="avatar avatar-sm rounded-circle" alt="User Image" src="/assets/img/corperimage/'+value.profile_pic+'"><div class="comment-body"><div class="meta-data"><span class="comment-author">'+value.name+'</span><span class="comment-date">Reviewed '+jQuery.timeago(value.time_created)+'</span><div class="review-count rating">'+star+'</div></div><p class="comment-content">'+value.reply_review_content+'</p><div class="comment-reply"><p class="recommend-btn"><span>Recommend?</span><a href="#" class="like-btn" data-id="'+value.shop_review_reply_id+'" id="shop_review_reply_yes_btn"><i class="far fa-thumbs-up"></i> Yes '+value.reply_review_yes+'</a><a href="#" class="dislike-btn" data-id="'+value.shop_review_reply_id+'" id="shop_review_reply_no_btn"><i class="far fa-thumbs-down"></i> No '+value.reply_review_no+'</a></p></div></div></div></li>';

    $('#sub_review_list').append(sub_review_list);



      });
   
       
    }
    
      
    }


  })

    }




$('body').delegate('#shop_review_reply_yes_btn', 'click', function(e){

    e.preventDefault();
    var review_reply_id = $(this).data('id');

      if (confirm('Are you sure?')) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewreplyyes')}}",
    method:"POST",
    data:{review_reply_id:review_reply_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
      loadReply();
      
    }


  })

  }

  });



$('body').delegate('#shop_review_reply_no_btn', 'click', function(e){

    e.preventDefault();
    var review_reply_id = $(this).data('id');

      if (confirm('Are you sure?')) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewreplyno')}}",
    method:"POST",
    data:{review_reply_id:review_reply_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
      loadReply();
      
    }


  })

  }

  });







  });



$('body').delegate('#shop_review_yes_btn', 'click', function(e){

    e.preventDefault();
    var review_id = $(this).data('id');

      if (confirm('Are you sure?')) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewyes')}}",
    method:"POST",
    data:{review_id:review_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    getReviews();
      
    }


  })

  }

  });



$('body').delegate('#shop_review_no_btn', 'click', function(e){

    e.preventDefault();
    var review_id = $(this).data('id');

      if (confirm('Are you sure?')) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewno')}}",
    method:"POST",
    data:{review_id:review_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    getReviews();
      
    }


  })

  }

  });




$('body').delegate('#review_reply_btn', 'click', function(e){

    e.preventDefault();
    var review_reply_id = $(this).data('id');
    $('#review_reply_id').val(review_reply_id);
	$('#reviewreplyModal').show();



  });



$('#reviewreplyup').click(function(){
$('#reviewreplyModal').hide();
});


$('#reviewreplydown').click(function(){
$('#reviewreplyModal').hide();
});




$("#reviewreply_star").bind("change keyup", function(event){
    var reviewreply_star = $(this).val();

    if (reviewreply_star == 1) {
   var reviewreply_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }else if (reviewreply_star == 2) {
    	var reviewreply_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }else if (reviewreply_star == 3) {
    	var reviewreply_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }else if (reviewreply_star == 4) {
    	var reviewreply_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }else if (reviewreply_star == 5) {
    	var reviewreply_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }else{

    var reviewreply_star_preview = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#reviewreply_star_preview').html(reviewreply_star_preview);

    }
    

  });



	$('#add_reviewreply_btn').click(function(event){
		event.preventDefault();
		var reviewreply_star = $('#reviewreply_star').val();		
		var reviewreply_content = $('#reviewreply_content').val();
		var r_r_id = $('#review_reply_id').val();

		if (reviewreply_star == '') {
			alert('Select Star Please');
		}else if(reviewreply_content == ''){
			alert('Please, Enter Content');
		}else{

			if (confirm('Are you sure?')) {
$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addreviewreply')}}",
    method:"POST",
    data:{r_r_id:r_r_id,reviewreply_star:reviewreply_star,reviewreply_content:reviewreply_content,_tokens:_tokens  },
    success:function(data){

    //console.log(data)
    alert(data);
 $('#reviewreply_star').val('');		
 $('#reviewreply_content').val('');
       
   $('.overlay').hide();
      
    }


  })

  }

		}
	});











	});
</script>

@include('inc.cart')
@include('inc.sendshopmessage')
@include('inc.reviewreply')
@endsection
