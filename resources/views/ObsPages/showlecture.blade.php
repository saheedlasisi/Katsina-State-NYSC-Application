@include('ObsInc.replyquestion')
@extends('ObsLayouts.app')
@section('content')

<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('obs.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Lecture</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Lectures</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->




<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->						@include('ObsInc.sider')
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="blog-view">
                <div class="blog blog-single-post">
                
                  <h6 class="blog-title"> {{$lecture->l_topic}}</h6>
                  <div class="blog-info clearfix">
                    <div class="post-left">
                      <ul>
                        <li>
                          <div class="post-author">
                            <a href="javascript:void(0)"> <i class="far fa-user"></i> <span>{{$lecture->lecturer_name}} </span></a>
                          </div>
                        </li>
                           <li><i class="far fa-eye"></i> <span> {{$lecture->l_view}}</span></li>
                        <li><i class="far fa-calendar"></i> <span>{{date('d-M-Y', strtotime($lecture->created_at))}} </span></li>
                        <li><a href="javascript:void(0);" class="btn btn-primary btn-sm" id="edit_lecture" style="color: #fff;" data-id="{{$lecture->l_id}}" data-topic="{{$lecture->l_topic}}" data-content="{{$lecture->l_content}}" data-status="{{$lecture->obs_lecture_status}}" data-name="{{$lecture->lecturer_name}}" data-batch="{{$lecture->l_batch}}" data-stream="{{$lecture->l_stream}}" data-year="{{$lecture->l_year}}"><i class="fa fa-pen" style="color: #fff;"></i> Edit</a></li>
                        <li><a href="javascript:void(0);" class="btn btn-danger btn-sm" id="remove_lecture" style="color: #fff;" data-id="{{$lecture->l_id}}" > <i class="fa fa-trash" style="color: #fff;"></i> Remove</a></li>

                      </ul>
                    </div>
                  </div>
                  <div class="blog-content">
                   <p>{!! $lecture->l_content !!}</p>
                  </div>
                </div>
                
             
           
               <div class="card blog-comments clearfix">
                  <div class="card-header">
                    <h5 class="card-title"> @if(count($questions) == 0)

                    		{{count($questions).' Question' }}
                    	@elseif(count($questions) == 1)
                    	{{count($questions).' Question' }}
                    	@else
                    	{{count($questions).' Questions' }}
                    	@endif
                    </h5>
                  </div>
                  <div class="card-body pb-0">
                  <ul class="comments-list">
                    
                   

                   	@if(count($questions) > 0)

                   	@foreach($questions as $ques)

                   	@if($ques->reply == '')

                   	<li>
                   	<div class="comment">
                   	<div class="comment-author">
                   	<img class="avatar" alt="" src="/assets/img/corperimage/{{$ques->profile_pic}}" ></div>
                   	<div class="comment-block"><span class="comment-by"><span class="blog-author-name">{{$ques->user_name}}</span></span><p>{{$ques->question}}</p><p class="blog-date">{{date('d-M-Y', strtotime($ques->created_at))}}</p>
                   		<a class="comment-btn" href="javascript:void(0)" id="reply_question" data-id="{{$ques->l_q_id}}" data-status="{{$ques->q_status}}" data-reply="{{$ques->reply}}" ><i class="fas fa-reply"></i> Reply</a></div></div></li>

                   	@else
					<li>
                   	<div class="comment">
                   	<div class="comment-author">
                   	<img class="avatar" alt="" src="/assets/img/corperimage/{{$ques->profile_pic}}" ></div>
                   	<div class="comment-block"><span class="comment-by"><span class="blog-author-name">{{$ques->user_name}}</span></span><p>{{$ques->question}}</p><p class="blog-date">{{date('d-M-Y', strtotime($ques->created_at))}}</p>
                   		<a class="comment-btn" href="javascript:void(0)" id="reply_question" data-id="{{$ques->l_q_id}}" data-status="{{$ques->q_status}}" data-reply="{{$ques->reply}}" ><i class="fas fa-reply"></i> Reply</a>
                   	</div></div><ul class="comments-list reply">
                   	<li>
                   	<div class="comment">
                   	<div class="comment-author">
                   	<img class="avatar" alt="" src="/assets/img/corperimage/{{$ques->image}}"></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">{{$ques->obs_name}}</span></span><p>{!! $ques->reply !!}</p><p class="blog-date">{{date('d-M-Y', strtotime($ques->updated_at))}}</p></div></div></li></ul></li>
                   	@endif

                   	@endforeach

                   	@else
                   		<center><h6>NO ROCORD FOUND</h6></center>

                   	@endif


                 
                  </ul>
                </div>
                </div>


             
            
                
              </div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->



@include('ObsInc.changepassword')
@include('ObsInc.editlecture')
@endsection