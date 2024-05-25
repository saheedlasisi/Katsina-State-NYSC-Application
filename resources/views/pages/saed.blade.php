@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Saed</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
						</div>


						<!-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> -->




					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->








@if(count($sessions) > 0)
@foreach($sessions as $session)

<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img1">
										<a href="{{ asset('assets/img/saedimage/'.$session->image) }}">
											<img src="{{ asset('assets/img/saedimage/'.$session->image) }}" class="img-fluid" alt="User Image">
										</a>
									</div>
									<br />
									<div class="doc-info-cont">
										<h4 class="doc-name mb-2"><a href="pharmacy-details.html">{{$session->saed_title}}</a></h4>
										<div class="rating mb-2">

											<?php  

											$member = $session->member;
										

											$rate = $member / 5;

											if ($rate == 0) {

											echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}else if ($rate > 0 && $rate < 1) {

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
										
										
										</div>
										<div class="clinic-details">
											<div class="clini-infos pt-3">
										
											<p class="doc-location mb-2"><i class="fas fa-phone-volume mr-1"></i> {{$session->phone_number}}</p>
											<p class="doc-location mb-2 text-ellipse"><i class="fas fa-map-marker-alt mr-1"></i> {{$session->address}} </p>
											<p class="doc-location mb-2"><i class="fas fa-plane mr-1"></i> {{$session->state_of_origin}}</p>
											<p class="doc-location mb-2"><i class="fas fa-home mr-1"></i> {{$session->lga}}</p>
											<p class="doc-location mb-2"><i class="fas fa-users mr-1"></i> ({{$session->member}})</p>
											<p class="doc-location mb-2"><i class="fas fa-user mr-1"></i> {{$session->name}}</p>
									
										</div>
										</div>
									</div>
								</div>
								<div class="doc-info-right d-flex align-items-center justify-content-center">
									<div class="clinic-booking">
										<a class="view-pro-btn" href="mailto:{{$session->email}}">Send Message</a>
										<a class="apt-btn" href="tel:{{$session->phone_number}}">Call Now</a>

										@if(count($enrolls) > 0)
										<a href="javascript:void(0);" class="view-pro-btn" style="color: red;" data-id="{{$session->saed_session_id}}" id="saed_unenroll"><i class="fa fa-trash"></i> Leave</a>
										@else
										<a href="javascript:void(0);" class="view-pro-btn" data-saed="{{$session->id}}"  data-id="{{$session->saed_session_id}}" id="saed_enroll"><i class="far fa-user"></i> Join</a>
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
										<a class="nav-link" href="#saed_reviews_tap" data-toggle="tab">Review</a>
									</li>


										@if(count($enrolls) > 0)
										<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Lecture <div class="badge badge-success badge-pill" >{{count($lecs)}} </div></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">E-Book</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Discussion Platform</a>
									</li>
										@else
										
										@endif







									

									
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
												<h4 class="widget-title">About Us</h4>
											{!! $session->about !!}
											</div>
											<!-- /About Details -->
										
										

										</div>
									</div>
								</div>
								<!-- /Overview Content -->



								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
										
						
<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title">Lectures</h4>
						<div class="experience-box">





@if(count($enrolls) > 0)
							@foreach($enrolls as $enroll)
							@if($enroll->access == 'off')
<center><h3>Sorry your access to those Lectures here has been terminated<br /> <span>Contant you SaedMaster For more details {{$session->phone_number}}</span></h3></center>
							@else
	

							
							<ul class="experience-list">
							@if(count($lecs) > 0)
							<?php $no = 1;?>
							@foreach($lecs as $lec)
							<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
									<div class="timeline-content">
										<p class="exp-yea" style="font-weight: 700;"> {{$no}}</p>
										<p class="exp-year"> {{\Carbon\Carbon::parse($lec->created_at)->diffForHumans()}}</p>
							<h4 class="exp-title">{{$lec->lecture_title}}</h4>
							<div>
								<button class="btn btn-success" id="viewsaedlecture" data-title="{{$lec->lecture_title}}" data-content="{{$lec->lecture_content}}" data-view="{{$lec->view}}" data-question="{{$lec->question}}" data-date="{{$lec->created_at}}" data-id="{{$lec->saed_session_lecture_id}}">view</button>
									
							</div>
						</div>
					</div>
				</li>
				<?php $no++; ?>
				@endforeach
				@else
				<center><h6>NO RECORD FOUND</h6></center>
				@endif
			</ul>



							@endif
							@endforeach
							@else

							@endif

						
													
		</div>
	</div>
	<!-- /Awards Details -->

								</div>
								<!-- /Locations Content -->
								


		<!-- Locations Content -->
		<div role="tabpanel" id="saed_reviews_tap" class="tab-pane fade">
								
<input type="hidden" name="saed_name" id="saed_name" value="{{$session->name}}">						<input type="hidden" name="saed_image" id="saed_image" value="{{$session->image}}">						
<input type="hidden" name="saed_id" id="saed_id" value="{{$session->id}}">
<input type="hidden" name="session_id" id="session_id" value="{{$session->saed_session_id}}">

									@if(count($enrolls) > 0)


									<!-- Write Review -->
						<div class="write-review">



							<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list" id="saed_review_list">
											
											<!-- Comment List -->
											
											<!-- /Comment List -->
											
										</ul>
										
										
										
									</div>
									<!-- /Review Listing -->


					<h4>Write a review for <strong>{{$session->saed_title}}</strong></h4>
										
										<!-- Write Review Form -->
						<form>
						
						 {{ csrf_field() }}
						 <input type="hidden" name="saed_id" id="saed_id" value="{{$session->id}}">
						 <input type="hidden" name="session_id" id="session_id" value="{{$session->saed_session_id}}">
					<div class="form-group">
					<label>Review Star</label>
					<select class="form-control" name="saed_review_star" id="saed_review_star">
						<option value="">Select Review Rating Star</option>
						<option value="1">1 Star</option>
						<option value="2">2 Stars</option>
						<option value="3">3 Stars</option>
						<option value="4">4 Stars</option>
						<option value="5">5 Stars</option>
					</select>
					<div class="rating" id="saed_review_star_preview">
					
				</div>
				</div>
				
				<div class="form-group">
				<label>Your review</label>
				<textarea id="saed_review_content" name="saed_review_content" class="form-control"></textarea>
				<div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">Breaking Down</span> your review[i.e text] will make it comes out in a perfect way, Thank you.</small></div>
											  
				<hr>
				
				<div class="submit-section">
					<button class="btn btn-primary submit-btn" id="add_saed_review_btn">Add Review</button>
				</div>
			</form>
			<!-- /Write Review Form -->
										
		</div>
		<!-- /Write Review -->


									@else




							<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list" id="saed_review_list">
											
											
											
										</ul>
										
										
										
									</div>
									<!-- /Review Listing -->						

									@endif

								</div>
								<!-- /Locations Content -->

				</div>





				<!-- Reviews Content -->
					<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
							@if(count($enrolls) > 0)
							@foreach($enrolls as $enroll)
							<input type="hidden" name="member_id" id="member_id" value="{{$enroll->saed_session_member_id}}">
							@if($enroll->access == 'off')
<center><h3>Sorry your access to those Files here has been terminated <br /> <span>Contant you SaedMaster For more details {{$session->phone_number}}</h3></center>
							@else
	<div class="row">

								@if(count($ebooks) > 0)	
								@foreach($ebooks as $book)
								<div class="col-md-2 col-lg-3 col-xl-3 product-custom">
	                                <div class="profile-widget">
										<div class="doc-img">
											<a href="{{asset('assets/book/saedebook/'.$book->ebook) }}" tabindex="-1" id="add_ebook_view" data-id="{{$book->saed_ebook_id}}">
												<img class="img-fluid" alt="Product image" src="{{asset('assets/book/saedebook/bookimage.png') }}">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title pb-4">
												<a href="{{asset('assets/book/saedebook/'.$book->ebook) }}" tabindex="-1" id="add_ebook_view" data-id="{{$book->saed_ebook_id}}">{{$book->ebook_title}}</a>
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price"><i class="fa fa-eye" style="color: lightgreen;"></i> {{$book->view}}</span>
												</div>
												
											</div>
										</div>
									</div>		
                            	</div>
								@endforeach
								@else
								<center><h5>NO RECORD FOUND</h5></center>
								@endif

								
                            </div>

							@endif
							@endforeach
							@else

							@endif
			
									
						
					</div>
					<!-- /Reviews Content -->





								<!-- Business Hours Content -->
		<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
		
		

			<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Members <div class="badge badge-success badge-pill" >{{count($members)}} </div></a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Group Discussion</a></li>
		
		</ul>
		<div class="tab-content">
			<div class="tab-pane show active" id="solid-tab1">

<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title">Memebers</h4>
						<div class="experience-box">
													
							<ul class="experience-list">
							@if(count($members) > 0)
							
							@foreach($members as $mem)
							<li>
								<div class="experience-user">
									<div class="before-circle"></div>
								</div>
								<div class="experience-content">
									<div class="timeline-content">
										
								@if(auth()->user()->id == $mem->id)	
								<h4 class="exp-title"><a href="/myprofile/{{$mem->name}}/{{$mem->id}}">You</a></h4>
								@else
<h4 class="exp-title"><a href="/corpsmemberprofile/{{$mem->name}}/{{$mem->id}}">{{$mem->name}}</a></h4>
							<div>
							<a href="tel:{{$mem->phone_number}}" class="btn btn-white call-btn" data-id="{{$mem->id}}" id="call_user_btn"> <i class="fas fa-phone"></i> </a>
							<a href="https://wa.me/{{$mem->whatsapp_number}}?text={{ urlencode('Hi, i am '.auth()->user()->name)}}" class="btn btn-white call-btn" data-id="{{$mem->id}}" id="call_whatsapp_btn">
						<i class="fab fa-whatsapp"></i></a>

					
									
							</div>

								@endif		
							
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




			<div class="tab-pane" id="solid-tab2">
				   <div class="content">
        <div class="containe">
          <div class="row">
            <div class="col-xl-12">
              <div class="chat-window">
              
                
              
                <!-- Chat Right -->
                <div class="chat-now">
   
                  <div class="chat-body">
                    <div class="chat-scroll">
                      <ul class="list-unstyled" id="sessionchat_box">
                        
                     
                        
                
                        
                      </ul>
                    </div>
                  </div>
                  <div class="chat-footer">
                    <div class="input-group">
                    
                   <textarea rows="1" class="input-msg-send form-control" placeholder="Reply" id="session_message"></textarea>
                     <div class="input-group-append">
                        <button type="button" class="btn msg-send-btn" id="session_msg_button"><i class="fab fa-telegram-plane"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Chat Right -->
                
              </div>
            </div>
          </div>
          <!-- /Row -->

        </div>

      </div>
			</div>
			
		</div>



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
	@else
	<center><h6>NO RECORD FOUND</h6></center>
	@endif























<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();
var saed_name = $('#saed_name').val();
var saed_image = $('#saed_image').val();


$('body').delegate('#saed_enroll', 'click', function(e){

    e.preventDefault();
    var saed_id = $(this).data('saed');

    var session_id = $(this).data('id');
    

      if (confirm('Are you sure of this?')) {
      	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.saedenroll')}}",
    method:"POST",
    data:{saed_id:saed_id,session_id:session_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
    $('.overlay').hide();
       
    
      
    }


  })

  }

  });







$('body').delegate('#saed_unenroll', 'click', function(e){

    e.preventDefault();


    var session_id = $(this).data('id');
    

      if (confirm('Are you sure of this?')) {
      	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.saedunenroll')}}",
    method:"POST",
    data:{session_id:session_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();
    $('.overlay').hide();
       
    
      
    }


  })

  }

  });



$("#saed_review_star").bind("change keyup", function(event){
    var saed_review_star = $(this).val();

    if (saed_review_star == 1) {
   var saed_review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }else if (saed_review_star == 2) {
    	var saed_review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }else if (saed_review_star == 3) {
    	var saed_review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }else if (saed_review_star == 4) {
    	var saed_review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }else if (saed_review_star == 5) {
    	var saed_review_star_preview = '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }else{

    var saed_review_star_preview = '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
   $('#saed_review_star_preview').html(saed_review_star_preview);

    }
    

  });




$('#add_saed_review_btn').click(function(event){


	event.preventDefault();

	var saed_id = $('#saed_id').val();
	var session_id = $('#session_id').val();
	var saed_review_star = $('#saed_review_star').val();
	var saed_review_content = $('#saed_review_content').val();

	if (saed_review_star == '') {
alert("Select Review Star");
	}else if (saed_review_content == '') {
alert("Type in your review");
	}else{

		if (confirm("Are you sure?")) {

    	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addsaedreview')}}",
    method:"POST",
    data:{saed_review_content:saed_review_content,saed_review_star:saed_review_star,saed_id:saed_id,session_id:session_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    $('.overlay').hide();
  $('#saed_review_star').val('');
	$('#saed_review_content').val('');
       getSaedReviews();
    
      
    }


  })

		}
	}
	


});




getSaedReviews();
function getSaedReviews(){

var session_id = $('#session_id').val();

 		  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.fetchsaedreview')}}",
    method:"POST",
    data:{session_id:session_id,_tokens:_tokens },
    success:function(data){

    //console.log(data)

$('#saed_review_list').empty();
        if (data == '') {
$('#saed_review_list').empty();
          var saed_review_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#saed_review_list').append(saed_review_list);

        }else{

             $('#saed_review_list').empty();
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

    var my_id = <?php echo auth()->user()->id ?>;

    if (my_id == value.user_id) {

    	var tool = '<i class="fa fa-trash" style="color: red;" data-id="'+value.saed_session_review_id+'" id="delete_saed_review"></i>';
    }else{
    	var tool = '';

    }


var saed_review_list = '<li><div class="comment"><img class="avatar avatar-sm rounded-circle" alt="User Image" src="/assets/img/corperimage/'+value.profile_pic+'"><div class="comment-body"><div class="meta-data"><span class="comment-author">'+value.name+'</span><span class="comment-date">Reviewed '+jQuery.timeago(value.time_created)+'</span><div class="review-count rating">'+star+'</div></div><p class="comment-content">'+value.review_content+'</p>'+tool+'</div></div></li>';

    $('#saed_review_list').append(saed_review_list);



      });
   
       
    }
      
    }


  })


}




$('body').delegate('#delete_saed_review', 'click', function(e){

    e.preventDefault();


    var review_id = $(this).data('id');
    

      if (confirm('Are you sure of this?')) {
      	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletesaedreview')}}",
    method:"POST",
    data:{review_id:review_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    $('.overlay').hide();
        getSaedReviews();
    
      
    }


  })

  }

  });





$('body').delegate('#viewsaedlecture', 'click', function(e){
e.preventDefault();

var title = $(this).data('title');
var lecture_id = $(this).data('id');
// var content = $(this).data('content');
// var date = $(this).data('date');
// var view = $(this).data('view');
// var question = $(this).data('question');
$('#saed_lecture_modal_topic').html(title);
$('#saed_lecture_topic').html(title);

	bringSaedLecture();
	function bringSaedLecture(){

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.bringsaedlecture')}}",
    method:"POST",
    data:{lecture_id:lecture_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)

    $('#saed_lecture_view').html(data.view);
$('#saed_lecture_question').html(data.question);
$('#saed_lecture_date').html(moment(data.created_at).format('DD-MM-YYYY'));
$('#saed_lecture_body').html(data.lecture_content);
$('#count_saed_question').html('Question(s) '+data.question);
    
    }

})

	}




$('#add_saed_question_btn').click(function(event){

event.preventDefault();	

var saed_lecture_question_content = $('#saed_lecture_question_content').val();

if (saed_lecture_question_content == '') {
alert('Your question?');
}else{

	 if (confirm('Are you sure of this?')) {
      	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addsaedlecturequestion')}}",
    method:"POST",
    data:{lecture_id:lecture_id,saed_lecture_question_content:saed_lecture_question_content,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    $('.overlay').hide();
    $('#saed_lecture_question_content').val('');
   
    bringSaedQuestion();
      
    }


  })

  }
}



});






	bringSaedQuestion();
	function bringSaedQuestion(){

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.bringsaedlecturequestion')}}",
    method:"POST",
    data:{lecture_id:lecture_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)

  $('#saed_lecture_question').html(data.count_question);
$('#count_saed_question').html('Question(s) '+data.count_question);


         $('#saed_question_list').empty();
         if (data.question == '') {
            $('#saed_question_list').empty();
            var saed_question_list ='<center><h6>NO RECORD FOUND</h6></center>';
            $('#saed_question_list').append(saed_question_list);
         }else {

    $('#saed_question_list').empty();
     $.each(data.question, function(i, value){


     	 var my_id = <?php echo auth()->user()->id ?>;

    if (my_id == value.user_id) {

    	var tool = '<i class="fa fa-trash" style="color: red;" data-id="'+value.saed_lecture_question_id+'" id="delete_lecture_question"></i>';
    }else{
    	var tool = '';

    }


        if (value.reply == '') {

            var saed_question_list = '<li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+jQuery.timeago(value.time_created)+'</p>'+tool+'</div></div><ul class="comments-list reply"></ul></li>';

    $('#saed_question_list').append(saed_question_list);

        }else{

            var saed_question_list = '<li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+jQuery.timeago(value.time_created)+'</p><a class="comment-btn" href="javascript:void(0)"><i class="fas fa-reply"></i> Reply</a></div></div><ul class="comments-list reply"><li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/saedimage/'+saed_image+'"></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+saed_name+'</span></span><p>'+value.reply+'</p><p class="blog-date">'+jQuery.timeago(value.time_updated)+'</p></div></div></li></ul></li>';

$('#saed_question_list').append(saed_question_list);


        }



     });


         }


    
    }

})

	}







$('body').delegate('#delete_lecture_question', 'click', function(e){

    e.preventDefault();


    var saed_question_id = $(this).data('id');
    

      if (confirm('Are you sure of this?')) {
      	$('.overlay').show();
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletesaedlecturequestion')}}",
    method:"POST",
    data:{saed_question_id:saed_question_id,lecture_id:lecture_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    alert(data);
    $('.overlay').hide();
        bringSaedQuestion();
    
      
    }


  })

  }

  });	







// $('#saed_lecture_view').html(view);
// $('#saed_lecture_question').html(question);
// $('#saed_lecture_date').html(date);
// $('#saed_lecture_body').html(content);
// $('#count_saed_question').html('Question(s) '+question);


$('#viewsaedlectureModal').show();
});

$('#viewsaedlectureup').click(function(){
$('#viewsaedlectureModal').hide();
});


$('#viewsaedlecturedown').click(function(){
$('#viewsaedlectureModal').hide();
});





$('body').delegate('#add_ebook_view', 'click', function(e){


    var ebook_id = $(this).data('id');
    

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.addebookview')}}",
    method:"POST",
    data:{ebook_id:ebook_id,_tokens:_tokens},
    success:function(data){

    console.log(data)
 
    
      
    }


  })



  });



  $('#session_msg_button').click(function(event){

event.preventDefault();

var session_message = $('#session_message').val();
var session_id = $('#session_id').val();
var saed_id = $('#saed_id').val();
var member_id = $('#member_id').val();

if (session_message == '') {


}else{

			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('user.sendsessionchat')}}",
		method:"POST",
		data:{session_message:session_message,session_id:session_id,saed_id:saed_id,member_id:member_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)

	

	if (data == 'success') {
$('#session_message').val('');
	}else{

		alert(data);
	}
	//loadSeesionChats();
	
			
		}


	})
}


});




setInterval(function(){ loadSeesionChats() }, 3000);
loadSeesionChats();
function loadSeesionChats(){

	var session_id = $('#session_id').val();

		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('user.fetchsessionchat')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data);


	$('#sessionchat_box').empty();
    if (data == '') {

    }else{

$('#sessionchat_box').empty();
     $.each(data, function(i, value){

var user_id = <?php echo auth()->user()->id?>;

	if (value.user_id == user_id && value.user_type == 'corper') {

var sessionchat_box = '<li class="media sent" id="delete_my_session_msg" data-id="'+value.saed_session_chat_id+'"><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li> </ul></div></div></div></li>';

    $('#sessionchat_box').append(sessionchat_box);

	}else{


		if (value.user_type == 'corper') {


 var sessionchat_box = '<li class="media received"><div class="avatar"><img src="/assets/img/corperimage/'+value.profile_pic+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li>';

    $('#sessionchat_box').append(sessionchat_box);
		}else{



 var sessionchat_box = '<li class="media received"><div class="avatar"><img src="/assets/img/saedimage/'+saed_image+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li>';

    $('#sessionchat_box').append(sessionchat_box);


		}


	}

    	



      });

    }

			
		}


	})


}





$('body').delegate('#delete_my_session_msg', 'dblclick', function(e){

    e.preventDefault();


    var chat_id = $(this).data('id');
    

      if (confirm('Do you want to delete this message?')) {
      
      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletesessionchat')}}",
    method:"POST",
    data:{chat_id:chat_id,_tokens:_tokens},
    success:function(data){

//console.log(data)
    // alert(data);

    loadSeesionChats();
    
      
    }


  })

  }

  });	




















	});
</script>





@include('inc.viewsaedlecture')
@include('inc.createshop')
@endsection
