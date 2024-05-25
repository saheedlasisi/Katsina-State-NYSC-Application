@extends('MainLayouts.home')
@section('content')



<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							@foreach($chats as $chat)
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header" style="background: lightgreen;">
										<span style="color: #000;">Help Desk , {{'#'.$ticket_id}}</span>
										
									</div>
								
									<div class="chat-users-list">
										<div class="chat-scroll">
											<a href="javascript:void(0);" data-id="{{$ticket_id}}" class="media" id="open_chat">
												<div class="media-img-wrap">
												
													<div class="avatar avatar-online">
												<img src="{{ asset('assets/img/helpdesk/helpdesk2.png')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">{{$chat->name}}</div>
														<div class="user-last-chat">{{$chat->subject}}</div>
													</div>
													<div>
														<div class="last-chat-time block">{{Carbon\Carbon::parse($chat->created_at)->diffForHumans()}}</div>



														@if($chat->ticket_status == 'active')
												<div class="badge badge-success badge-pill">{{$chat->ticket_status}}</div>

													@else

														<div class="badge badge-danger badge-pill">{{$chat->ticket_status}}</div>

													
													@endif
											

													</div>
												</div>
											</a>

											@if($chat->ticket_status == 'active')
													<div style="margin-top: 2px;" class="hide_close">
												<p class="text-center">Click close button <span><a href="#" class="btn btn-danger btn-sm" id="close_btn">close</a></span> to end the ticket.</p>
											</div>
													@else
													
													@endif


										
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
							
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header" style="background: lightgreen;">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										@if($chat->staff_email == '')

										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-offline">
													<img src="{{ asset('assets/img/staffimage/noimage.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">Awaiting......</div>
												<div class="user-status"><i>awaiting.....</i></div>
											</div>
										</div>
										
										@else
										@foreach($staff_image as $staff)
										<input type="hidden" id="staff_profile_image" value="{{$staff->profile_picture}}">
										@if($chat->ticket_status == 'active')
											<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img src="{{ asset('assets/img/staffimage/'.$staff->profile_picture)}}" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">{{$staff->name}}</div>
												<div class="user-status">{{$staff->position}}</div>

												
											</div>
										</div>
												@else
													<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-offline">
													<img src="{{ asset('assets/img/staffimage/'.$staff->profile_picture)}}" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">{{$staff->name}}</div>
												<div class="user-status">closed</div>

												
											</div>
										</div>
												@endif
												
									
										@endforeach
										@endif

										
										<div class="chat-options">
											<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call">
												<i class="material-icons">local_phone</i>
											</a>
											<a href="javascript:void(0)" data-toggle="modal" data-target="#video_call">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll">
											<ul class="list-unstyled" id="user_msgs">
												
												
												
								
											</ul>
										</div>
									</div>
									<div class="chat-footer">
										<div class="input-group">
										<input type="hidden" name="msg_ticket_id" id="msg_ticket_id" value="{{$chat->ticket_id}}">
										<input type="hidden" name="user_email" id="user_email" value="{{$chat->email}}">
										<input type="hidden" name="user_name" id="user_name" value="{{$chat->name}}">
										<input type="hidden" name="row_id" id="row_id" value="{{$chat->h_d_id}}">
										<input type="hidden" name="user_subject" id="user_subject" value="{{$chat->subject}}">
										
										<textarea rows="1" class="input-msg-send form-control" placeholder="Reply" id="msg"></textarea>
										
											<div class="input-group-append">
												<button type="button" class="btn msg-send-btn" id="msg_button"><i class="fab fa-telegram-plane"></i></button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->
@endforeach
				</div>

			</div>		
			<!-- /Page Content -->





@endsection