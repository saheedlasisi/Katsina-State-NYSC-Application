@extends('SaedMasterLayouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('obs.dashboard')}}">SAED</a></li>
									<li class="breadcrumb-item active" aria-current="page">Session</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
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
										<a href="{{ asset('assets/img/saedimage/'.auth()->guard('saedmaster')->user()->image) }}">
											<img src="{{ asset('assets/img/saedimage/'.auth()->guard('saedmaster')->user()->image) }}" class="img-fluid" alt="User Image">
										</a>
									</div>
									<br />
									<div class="doc-info-cont">
										<h4 class="doc-name mb-2"><a href="pharmacy-details.html">{{auth()->guard('saedmaster')->user()->saed_title}}</a></h4>
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
	<input type="hidden" name="saed_name" id="saed_name" value="{{auth()->guard('saedmaster')->user()->name}}">		
	<input type="hidden" name="saed_image" id="saed_image" value="{{auth()->guard('saedmaster')->user()->image}}">
										<div class="clinic-details">
											<div class="clini-infos pt-3">
										
											
											
										<p class="doc-location mb-2"><i class="fas fa-user mr-1"></i>Batch: {{$session->session_batch}}</p>
											<p class="doc-location mb-2"><i class="fas fa-user mr-1"></i>Stream: {{$session->session_stream}}</p>
											<p class="doc-location mb-2"><i class="fas fa-user mr-1"></i>Year: {{$session->session_year}}</p>
												<p class="doc-location mb-2"><i class="fas fa-users mr-1"></i> ({{$session->member}})</p>
									
										</div>
										</div>
									</div>
								</div>
								<div class="doc-info-right d-flex align-items-center justify-content-center">
									<div class="clinic-booking">
										<a class="view-pro-btn" href="javascript:void(0);" id="upload_saed_lecture_btn">Upload Lecture</a>

										<a class="apt-btn" href="javascript:void(0)" id="upload_session_ebook">Upload E-book</a>

										@if(count($group) > 0)

										<a href="javascript:void(0);" class="view-pro-btn" style="color: red;" data-id="{{$session->saed_session_id}}" id="unlock_session_group"><i class="fa fa-users"></i> Unlock Group</a>
										@else
										<a href="javascript:void(0);" class="view-pro-btn" data-id="{{$session->saed_session_id}}" id="lock_session_group"><i class="fa fa-users"></i> Lock Group</a>
										@endif
										
									
										
										
									
										
										
										<input type="hidden" name="session_id" id="session_id" value="{{$session->saed_session_id}}">

										

										
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
										<a class="nav-link" href="#saed_reviews_tap" data-toggle="tab">Review <div class="badge badge-success badge-pill" id="count_saed_review"> </div></a>
									</li>


										
										<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Lectures <div class="badge badge-success badge-pill" >{{count($lecs)}} </div></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">E-Book <div class="badge badge-success badge-pill" >{{count($ebooks)}} </div></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Discussion Platform @if(count($chat_notifies) > 0)<div class="badge badge-danger badge-pill" >{{count($chat_notifies)}} </div> @else  @endif</a>
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
												<h4 class="widget-title">About Us</h4>
											{!! auth()->guard('saedmaster')->user()->about !!}
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
								<button class="btn btn-success btn-sm" id="viewsaedlecture" data-title="{{$lec->lecture_title}}" data-content="{{$lec->lecture_content}}" data-view="{{$lec->view}}" data-question="{{$lec->question}}" data-date="{{$lec->created_at}}" data-id="{{$lec->saed_session_lecture_id}}">view</button>
									<button class="btn btn-primary btn-sm" id="editsaedlecture" data-title="{{$lec->lecture_title}}" data-content="{{$lec->lecture_content}}" data-id="{{$lec->saed_session_lecture_id}}">edit</button>
										<button class="btn btn-danger btn-sm" id="delete_saed_lecture" data-id="{{$lec->saed_session_lecture_id}}">delete</button>
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
													
		</div>
	</div>
	<!-- /Awards Details -->

								</div>
								<!-- /Locations Content -->
								


								<!-- Locations Content -->
								<div role="tabpanel" id="saed_reviews_tap" class="tab-pane fade">
								
										
						<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list" id="saed_review_list">
											
											<!-- Comment List -->
											
											<!-- /Comment List -->
											
										</ul>
										
										
										
									</div>
									<!-- /Review Listing -->

								</div>
								<!-- /Locations Content -->
								







								<!-- Reviews Content -->
					<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
							
								<div class="row">

								@if(count($ebooks) > 0)	
								@foreach($ebooks as $book)
								<div class="col-md-2 col-lg-3 col-xl-3 product-custom">
	                                <div class="profile-widget">
										<div class="doc-img">
											<a href="{{asset('assets/book/saedebook/'.$book->ebook) }}" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="{{asset('assets/book/saedebook/bookimage.png') }}">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h3 class="title pb-4">
												<a href="{{asset('assets/book/saedebook/'.$book->ebook) }}" tabindex="-1">{{$book->ebook_title}}</a>
											</h3>
											<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price"><i class="fa fa-eye" style="color: lightgreen;"></i> {{$book->view}}</span>
												</div>
												<div class="col-lg-6 text-right">
													<i class="fas fa-trash" style="color: red;" data-id="{{$book->saed_ebook_id}}" id="delete_book_btn"></i>
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
									
						
					</div>	
								<!-- Business Hours Content -->
		<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
		
		

			<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Members <div class="badge badge-success badge-pill" >{{count($members)}} </div></a></li>
			<li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab" id="clear_chat_session_history">Group Discussion @if(count($chat_notifies) > 0)<div class="badge badge-danger badge-pill" >{{count($chat_notifies)}} </div> @else  @endif</a></li>
		
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
										
								
<h4 class="exp-title"><a href="javascript:void(0)">{{$mem->name}}</a></h4>
							<div>
							<a href="tel:{{$mem->phone_number}}" class="btn btn-white call-btn"> <i class="fas fa-phone"></i> </a>
							<a href="https://wa.me/{{$mem->whatsapp_number}}?text={{ urlencode('Hi, i am '.auth()->guard('saedmaster')->user()->name)}}" class="btn btn-white call-btn" >
						<i class="fab fa-whatsapp"></i></a>

						@if($mem->access == 'on')
							<a href="javascript:void(0)" class="btn btn-danger call-btn btn-sm" data-id="{{$mem->saed_session_member_id}}" id="deny_user_access">
						<i class="fa fa-user"></i> Deny User Access</a>
						@else
	<a href="javascript:void(0)" class="btn btn-success call-btn btn-sm" data-id="{{$mem->saed_session_member_id}}" id="grant_user_access">
						<i class="fab fa-access"></i> Grant User Access</a>
						@endif
					

					
									
							</div>

										
							
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


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>		


	<script type="text/javascript">
		$(document).ready(function(){
var _tokens = $('input[name=_token]').val();
var saed_name = $('#saed_name').val();
var saed_image = $('#saed_image').val();



			getSaedReviews();
function getSaedReviews(){

var session_id = $('#session_id').val();

 		  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('saedmaster.fetchsaedsessionreview')}}",
    method:"POST",
    data:{session_id:session_id,_tokens:_tokens },
    success:function(data){

    //console.log(data)
    $('#count_saed_review').html(data.count_review);

$('#saed_review_list').empty();
        if (data.review == '') {
$('#saed_review_list').empty();
          var saed_review_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#saed_review_list').append(saed_review_list);

        }else{

             $('#saed_review_list').empty();
     $.each(data.review, function(i, value){


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



var saed_review_list = '<li><div class="comment"><img class="avatar avatar-sm rounded-circle" alt="User Image" src="/assets/img/corperimage/'+value.profile_pic+'"><div class="comment-body"><div class="meta-data"><span class="comment-author">'+value.name+'</span><span class="comment-date">Reviewed '+jQuery.timeago(value.time_created)+'</span><div class="review-count rating">'+star+'</div></div><p class="comment-content">'+value.review_content+'</p></div></div></li>';

    $('#saed_review_list').append(saed_review_list);



      });
   
       
    }
      
    }


  })


}





$('#upload_saed_lecture_btn').click(function(){
$('#saedlectureModal').show();
});

$('#saedlectureup').click(function(){
$('#saedlectureModal').hide();
});


$('#saedlecturedown').click(function(){
$('#saedlectureModal').hide();
});


$('#saed_lecture_upload_btn').click(function(event){

	   for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	event.preventDefault();

	var saed_lecture_title = $('#saed_lecture_title').val();
	var saed_lecture_content = $('#saed_lecture_content').val();
	var session_id = $('#session_id').val();

	if (saed_lecture_title == '') {
		alert("Enter Title");
	}else if(saed_lecture_content == ''){

alert("Enter Content");

	}else{

		if (confirm("Are you sure?")) {

				$('.overlay').show();
				$('#saedlectureModal').hide();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.addsaedlecture')}}",
		method:"POST",
		data:{saed_lecture_title:saed_lecture_title, saed_lecture_content:saed_lecture_content,session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	     window.location.reload();
    $('.overlay').hide();
    $('#saed_lecture_title').val('');
    CKEDITOR.instances['saed_lecture_content'].setData('');
  

		}


	})
		}

	}


});



$('body').delegate('#viewsaedlecture', 'click', function(e){
e.preventDefault();

var title = $(this).data('title');
var content = $(this).data('content');
var date = $(this).data('date');
var view = $(this).data('view');
var question = $(this).data('question');
var lecture_id = $(this).data('id');


$('#saed_lecture_modal_topic').html(title);
$('#saed_lecture_topic').html(title);
$('#saed_lecture_view').html(view);
$('#saed_lecture_question').html(question);
$('#saed_lecture_date').html(date);
$('#saed_lecture_body').html(content);
$('#count_saed_question').html('Question(s) '+question);






bringSaedQuestion();
	function bringSaedQuestion(){

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('saedmaster.bringsaedlecturequestion')}}",
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



        if (value.reply == '') {

            var saed_question_list = '<li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+jQuery.timeago(value.time_created)+'</p><a class="comment-btn" href="javascript:void(0)" id="reply_saed_lecture_question" data-id="'+value.saed_lecture_question_id+'" data-question="'+value.question+'" data-reply="'+value.reply+'" ><i class="fas fa-reply"></i> Reply</a></div></div><ul class="comments-list reply"></ul></li>';

    $('#saed_question_list').append(saed_question_list);

        }else{

        	
            var saed_question_list = '<li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/corperimage/'+value.profile_pic+'" ></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.name+'</span></span><p>'+value.question+'</p><p class="blog-date">'+jQuery.timeago(value.time_created)+'</p><a class="comment-btn" href="javascript:void(0)" id="reply_saed_lecture_question" data-id="'+value.saed_lecture_question_id+'" data-question="'+value.question+'" data-reply="'+value.reply+'" ><i class="fas fa-reply"></i> Reply</a></div></div><ul class="comments-list reply"><li><div class="comment"><div class="comment-author"><img class="avatar avatar" alt="" src="/assets/img/saedimage/'+saed_image+'"></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+saed_name+'</span></span><p>'+value.reply+'</p><p class="blog-date">'+jQuery.timeago(value.time_updated)+'</p></div></div></li></ul></li>';

$('#saed_question_list').append(saed_question_list);


        }



     });


         }


    
    }

})

	}




$('#saed_lecture_reply_btn').click(function(event){

event.preventDefault();

var saed_lecture_reply_id = $('#saed_lecture_reply_id').val();
var saed_lecture_reply_content = $('#saed_lecture_reply_content').val();

if (saed_lecture_reply_content == '') {

	alert('Please fill in reply');

}else{

		if (confirm("Are you sure?")) {

				$('.overlay').show();
				$('#saedlectureModal').hide();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.replysaedlecturequestion')}}",
		method:"POST",
		data:{saed_lecture_reply_id:saed_lecture_reply_id, saed_lecture_reply_content:saed_lecture_reply_content,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	  
    $('.overlay').hide();
    bringSaedQuestion();
  

		}


	})
		}

}


});













$('#viewsaedlectureModal').show();
});

$('#viewsaedlectureup').click(function(){
$('#viewsaedlectureModal').hide();
});


$('#viewsaedlecturedown').click(function(){
$('#viewsaedlectureModal').hide();
});







$('body').delegate('#editsaedlecture', 'click', function(e){
e.preventDefault();

var title = $(this).data('title');
var content = $(this).data('content');
var lecture_id = $(this).data('id');

$('#edit_saed_lecture_title').val(title);
    CKEDITOR.instances['edit_saed_lecture_content'].setData(content);
$('#edit_saed_lecture_id').val(lecture_id);



$('#editsaedlectureModal').show();
});

$('#editsaedlectureup').click(function(){
$('#editsaedlectureModal').hide();
});


$('#editsaedlecturedown').click(function(){
$('#editsaedlectureModal').hide();
});





$('#edit_saed_lecture_upload_btn').click(function(event){

	   for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	event.preventDefault();

	var edit_saed_lecture_title = $('#edit_saed_lecture_title').val();
	var edit_saed_lecture_content = $('#edit_saed_lecture_content').val();
	var edit_saed_lecture_id = $('#edit_saed_lecture_id').val();


	if (edit_saed_lecture_title == '') {
		alert("Enter Title");
	}else if(edit_saed_lecture_content == ''){

alert("Enter Content");

	}else{

		if (confirm("Are you sure?")) {

				$('.overlay').show();
				$('#editsaedlectureModal').hide();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.updatesaedlecture')}}",
		method:"POST",
		data:{edit_saed_lecture_title:edit_saed_lecture_title, edit_saed_lecture_content:edit_saed_lecture_content,edit_saed_lecture_id:edit_saed_lecture_id,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	     window.location.reload();
    $('.overlay').hide();
   
  
  

		}


	})
		}

	}


});



$('body').delegate('#delete_saed_lecture', 'click', function(e){

		e.preventDefault();
		var lecture_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.deletesaedlecture')}}",
		method:"POST",
		data:{lecture_id:lecture_id,_tokens:_tokens},
		success:function(data){

	console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});





$('body').delegate('#reply_saed_lecture_question', 'click', function(e){
e.preventDefault();

var id = $(this).data('id');
var question = $(this).data('question');
var reply = $(this).data('reply');

$('#saed_lecture_reply_id').val(id);
$('#saed_lecture_reply_question').val(question);
$('#saed_lecture_reply_content').val(reply);

$('#replyquestionModal').show();
$('#viewsaedlectureModal').hide();
});

$('#replyquestionup').click(function(){
$('#replyquestionModal').hide();
});


$('#replyquestiondown').click(function(){
$('#replyquestionModal').hide();
});







$('#upload_session_ebook').click(function(){
$('#ebookModal').show();
});

$('#ebookup').click(function(){
$('#ebookModal').hide();
});


$('#ebookdown').click(function(){
$('#ebookModal').hide();
});







$('#upload_ebook_form').on('submit', function(event){

  event.preventDefault();

  var ebook_title = $('#ebook_title').val();
  var ebook = $('#ebook').val();
 
  

  if (ebook_title == '') {

$('#message').css('display', 'block');
$('#message').html('Enter Book Title');
$('#message').addClass('alert-danger');


  }else if(ebook == ''){

$('#message').css('display', 'block');
$('#message').html('Selet a book first');
$('#message').addClass('alert-danger');

  }else{

$.ajax({
    url:"{{ route('saedmaster.uploadebook') }}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

      

if (data.message == 'Book Uploaded Successfully') {

  // console.log(data);
  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);
     window.location.reload();
}else{

  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);

}
     

    }


  });

  }


  

});





$('body').delegate('#delete_book_btn', 'click', function(e){

		e.preventDefault();
		var ebook_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.deletebook')}}",
		method:"POST",
		data:{ebook_id:ebook_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});




$('body').delegate('#deny_user_access', 'click', function(e){

		e.preventDefault();
		var member_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.denyuseraccess')}}",
		method:"POST",
		data:{member_id:member_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});







$('body').delegate('#grant_user_access', 'click', function(e){

		e.preventDefault();
		var member_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.grantuseraccess')}}",
		method:"POST",
		data:{member_id:member_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});


$('#session_msg_button').click(function(event){

event.preventDefault();

var session_message = $('#session_message').val();
var session_id = $('#session_id').val();

if (session_message == '') {


}else{

			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.submitsessionchat')}}",
		method:"POST",
		data:{session_message:session_message,session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)

	$('#session_message').val('');
	loadSeesionChats();
	
			
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
		url:"{{route('saedmaster.loadsessionchat')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data);


	$('#sessionchat_box').empty();
    if (data == '') {

    }else{

$('#sessionchat_box').empty();
     $.each(data, function(i, value){


     if (value.user_type == 'saedmaster') {

var sessionchat_box = '<li class="media sent" id="delete_my_session_msg" data-id="'+value.saed_session_chat_id+'"><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li> </ul></div></div></div></li>';

    $('#sessionchat_box').append(sessionchat_box);

     }else{

 var sessionchat_box = '<li class="media received"><div class="avatar"><img src="/assets/img/corperimage/'+value.profile_pic+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li>';

    $('#sessionchat_box').append(sessionchat_box);


     }	



      });

    }

			
		}


	})


}






$('body').delegate('#delete_my_session_msg', 'dblclick', function(e){

		e.preventDefault();
		var chat_id = $(this).data('id');
		
		if (confirm('Do you wants to delete this message ?')) {

			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.deletemysessionmsg')}}",
		method:"POST",
		data:{chat_id:chat_id,_tokens:_tokens},
		success:function(data){

	//console.log(data);
		
			loadSeesionChats();
		}


	})

	}		


});



$('body').delegate('#lock_session_group', 'click', function(e){

		e.preventDefault();
		var session_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.locksessiongroup')}}",
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





$('body').delegate('#unlock_session_group', 'click', function(e){

		e.preventDefault();
		var session_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.unlocksessiongroup')}}",
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





$('#clear_chat_session_history').click(function(event){

	event.preventDefault();

	var session_id = $('#session_id').val();

				$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.clearsessionchat')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	console.log(data)
			
		}


	})


});











});
</script>

@include('SaedMasterInc.ebook')
@include('SaedMasterInc.replyquestion')
@include('SaedMasterInc.editsaedlecture')
@include('SaedMasterInc.viewsaedlecture')
@include('SaedMasterInc.saedlecture')
@include('SaedMasterInc.changepassword')
@endsection			