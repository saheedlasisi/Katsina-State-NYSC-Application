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
									<li class="breadcrumb-item active" aria-current="page">myShop</li>
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
@include('inc.message')
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

											<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Working Days:   {{$shop->shop_working_days}}</p>

											<p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i>Status:   {{$shop->shop_account_status}}</p>

										</div>
										</div>
									</div>
								</div>
								<div class="doc-info-right d-flex align-items-center justify-content-center">
									<div class="clinic-booking">
										<a class="view-pro-btn" href="javascript:void(0);" style="color: red;" data-id="{{$shop->shop_id}}" id="delete_shop_btn">Delete Shop</a>
										<a class="apt-btn" href="/editshop/{{$shop->shop_name}}/{{$shop->shop_id}}">Update Shop</a>
										<a href="javascript:void(0);" class="view-pro-btn" id="create_product_btn" data-id="{{$shop->shop_id}}" >Upload Product</a>
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
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab" id="clearcompletenotify_btn" data-id="{{$shop->shop_id}}">History @if(count($call) + count($mes) + count($order) > 0)<span><div class="badge badge-danger badge-pill" > {{count($call) + count($mes) + count($order)}}</div></span> @else @endif</a>
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
											<img class="img-fluid" alt="Product image" src="/assets/img/shopimage/{{$pro->product_image}}"></a><a href="javascript:void(0)" class="fav-btn" tabindex="-1"><i class="far fa-bookmark"></i></a></div><div class="pro-content"> <font size="4"><a href="/product/{{$pro->product_name}}/{{$pro->shop_product_id}}" tabindex="-1">{{$pro->product_name}}</a></font><div class="row align-items-center"><div class="col-lg-6"><span class="price"><s>N</s>{{number_format($pro->current_price)}}</span> <br /><span class="price-strike">N{{number_format($pro->old_price)}}</span></div><div class="col-lg-6 text-right"><a href="/deleteproduct/{{$pro->shop_product_id}}/{{$pro->shop_id}}" class="cart-icon confirmproductdeletebtn"><i class="fas fa-trash" style="color: red;"></i></a></div></div></div></div></div>
									@endforeach
									</div>
									@else

									<center><h6>NO RECORD FOUND</h6></center>
									@endif
									
								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								<input type="hidden" name="shop_id" id="shop_id" value="{{$shop->shop_id}}">
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list" id="review_list">
										
											
										</ul>
										
										
										
									</div>
									<!-- /Review Listing -->
								
									
						
								</div>
								<!-- /Reviews Content -->
								
		<!-- Business Hours Content -->
		<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
		
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Orders @if(count($order) > 0) <span><div class="badge badge-danger badge-pill"> {{count($order)}}</div></span> @else @endif</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab" id="clear_shop_message_status_btn">Messages @if(count($mes) > 0) <span><div class="badge badge-danger badge-pill"> {{count($mes)}}</div></span> @else @endif</a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab" id="clear_shop_call_status_btn">Calls @if(count($call) > 0) <span><div class="badge badge-danger badge-pill"> {{count($call)}}</div></span> @else @endif</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane show active" id="solid-tab1">
				<!-- Awards Details -->
		<div class="widget awards-widget">
			<h4 class="widget-title">Your Order(s) with them</h4>
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
			<h4 class="exp-title">Buyer Name :<a href="/corpsmemberprofile/{{$order->name}}/{{$order->id}}">{{$order->name}}</a></h4>
		<h4 class="exp-title">Name :<a href="/myproduct/{{$order->product_name}}/{{$order->shop_product_id}}">{{$order->product_name}}</a></h4>
		<h4 class="exp-title">Unit Price :{{number_format($order->product_price)}}</h4>
		<h4 class="exp-title">Qty :{{$order->quantity}}</h4>
		<h4 class="exp-title">Total :{{number_format($order->product_price * $order->quantity)}}</h4>
		<h4 class="exp-title">Deadline :{{date('d-M-Y', strtotime($order->period))}}</h4>
		@if($order->order_status == 'completed')
		<h4 class="exp-title">Order Status :{{$order->order_status}}, <a href="/myorderreceipt/{{$order->order_id}}/{{$order->seller_id}}/{{$order->product_id}}/{{$order->shop_id}}/{{$order->buyer_id}}"><i class="fa fa-print"></i> Receipt</a></h4>
		@else
		@endif
		
	@if($order->seller_order_status == 'pending')
		<h4 class="exp-title">if you have completed the order kindly click on complete button to notify the buyer to do the same <a href="javascript:void(0);" class="btn btn-success btn-sm" id="order_complete_btn" data-id="{{$order->order_id}}">Complete</a> <span>Note, If buyer confirm this order as completed it will earn you star point at both shop and product.</span></h4>
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
							<h4 class="widget-title">Messages</h4>
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
		<p class="exp-year"> {{\Carbon\Carbon::parse($message->time_sent)->diffForHumans()}}</p>
		<p><a href="/corpsmemberprofile/{{$message->name}}/{{$message->id}}">{{$message->sender_name}}</a></p>
<h4 class="exp-title">{{$message->shop_message_subject}}</h4>
{{ $message->shop_message_content }} <a href="javascript:void(0);" class="btn btn-white msg-btn" id="reply_shop_message_btn" data-email="{{$message->email}}" data-subject="{{$message->shop_message_subject}}" data-name="{{$message->sender_name}}"><i class="far fa-comment-alt"></i></a>

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
						<h4 class="widget-title"> Call Attempts</h4>
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
		<p class="exp-year"> {{\Carbon\Carbon::parse($call->time_called)->diffForHumans()}}</p>
<h4 class="exp-title"><a href="/corpsmemberprofile/{{$call->name}}/{{$call->id}}">{{$call->name}}</a></h4>
<h6>{{$call->phone_number}} <a href="tel:{{$call->phone_number}}" class="btn btn-white call-btn" data-id="{{$call->id}}" id="call_user_btn"> <i class="fas fa-phone"></i> </a> <a href="https://wa.me/{{$call->whatsapp_number}}?text={{ urlencode('Hi, i am '.$shop_name.' CEO')}}" class="btn btn-white call-btn" data-id="{{$call->id}}" id="call_whatsapp_btn">
<i class="fab fa-whatsapp"></i></a></h6>
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
    	var strat = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

    }else if (value.review_star == 5) {
    	var star = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';

    }else{

    }




var review_list = '<li><div class="comment"><img class="avatar avatar-sm rounded-circle" alt="User Image" src="/assets/img/corperimage/'+value.profile_pic+'"><div class="comment-body"><div class="meta-data"><span class="comment-author">'+value.name+'</span><span class="comment-date">Reviewed '+jQuery.timeago(value.time_created)+'</span><div class="review-count rating">'+star+'</div></div><p class="recommended"> '+value.review_title+'</p><p class="comment-content">'+value.review_content+'</p><div class="comment-reply"><a class="comment-btn" href="javascript:void(0)" data-id="'+value.shop_review_id+'" id="review_reply_btn"><i class="fas fa-reply"></i> Reply</a> <a class="btn btn-primary btn-sm" href="javascript:void(0)" data-id="'+value.shop_review_id+'" id="load_reply_btn"><i class="fas fa-pen"></i> Load Replies</a> &nbsp;<p class="recommend-btn"><span>Recommend?</span><a href="javascript:void(0)" class="like-btn" data-id="'+value.shop_review_id+'" id="shop_review_yes_btn"><i class="far fa-thumbs-up"></i> Yes '+value.review_yes+'</a> <a href="javascript:void(0)" class="dislike-btn" data-id="'+value.shop_review_id+'" id="shop_review_no_btn"><i class="far fa-thumbs-down"></i> No '+value.review_no+'</a></p></div></div></div> <ul class="comments-reply" id="sub_review_list"> </ul></li>';

    $('#review_list').append(review_list);



      });
   
       
    }
      
    }


  })


}




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
    	var strat = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

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
      	$('.overlay').show();

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewreplyyes')}}",
    method:"POST",
    data:{review_reply_id:review_reply_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
      loadReply();
      $('.overlay').hide();
      
    }


  })

  }

  });



$('body').delegate('#shop_review_reply_no_btn', 'click', function(e){

    e.preventDefault();
    var review_reply_id = $(this).data('id');

      if (confirm('Are you sure?')) {
      	$('.overlay').show();

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewreplyno')}}",
    method:"POST",
    data:{review_reply_id:review_reply_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
      loadReply();
      $('.overlay').hide();
      
    }


  })

  }

  });







  });



$('body').delegate('#shop_review_yes_btn', 'click', function(e){

    e.preventDefault();
    var review_id = $(this).data('id');

      if (confirm('Are you sure?')) {
      	$('.overlay').show();

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewyes')}}",
    method:"POST",
    data:{review_id:review_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    getReviews();
    $('.overlay').hide();
      
    }


  })

  }

  });



$('body').delegate('#shop_review_no_btn', 'click', function(e){

    e.preventDefault();
    var review_id = $(this).data('id');

      if (confirm('Are you sure?')) {
      	$('.overlay').show();

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.reviewno')}}",
    method:"POST",
    data:{review_id:review_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    getReviews();
    $('.overlay').hide();
      
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
    data:{r_r_id:r_r_id,reviewreply_star:reviewreply_star,reviewreply_content:reviewreply_content  ,_tokens:_tokens},
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




	$('body').delegate('#clear_shop_call_status_btn', 'click', function(e){
var shop_id = $('#shop_id').val();
   // e.preventDefault();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.clearshopcallstatus')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    console.log(data)
    
      
    }


  })



  });




$('body').delegate('#clear_shop_message_status_btn', 'click', function(e){

   // e.preventDefault();
   var shop_id = $('#shop_id').val();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.clearshopmessagestatus')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    console.log(data)
    
      
    }


  })



  });






$('body').delegate('#order_complete_btn', 'click', function(e){

    e.preventDefault();
    var order_id = $(this).data('id');

      if (confirm('Are you sure?')) {

      	$('.overlay').show();

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.ordercomplete')}}",
    method:"POST",
    data:{order_id:order_id,_tokens:_tokens},
    success:function(data){

   // console.log(data)
   alert(data);
    window.location.reload();
    $('.overlay').hide();

      
    }


  })

  }

  });





	$('body').delegate('#clearcompletenotify_btn', 'click', function(e){
var shop_id = $(this).data('id');
    e.preventDefault();
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.clearcompletenotify')}}",
    method:"POST",
    data:{shop_id:shop_id,_tokens:_tokens},
    success:function(data){

    console.log(data)
    
      
    }


  })



  });







	});
</script>


@include('inc.createproduct')
@include('inc.reviewreply')
@include('inc.replyshopmessage')
@endsection
