@extends('StaffLayouts.chat')
@section('content')

<!-- Page Content -->
@foreach($tickets as $ticket)
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header" style="background: lightgreen;">
										<span>Help Desk, {{'#'.$ticket->ticket_id}} </span>
									
									</div>
								
									<div class="chat-users-list">
										<div class="chat-scroll">
											<a href="javascript:void(0);" data-id="{{$ticket->ticket_id}}" id="open_chat" class="media">
												<div class="media-img-wrap">
														@if($ticket->ticket_status == 'active')
													<div class="avatar avatar-online">
													@else
													<div class="avatar avatar-offline">
													@endif
													
														<img src="{{ asset('assets/img/helpdesk/helpdesk2.png')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">{{$ticket->name}}</div>
														<div class="user-last-chat">{{$ticket->subject}}</div>
													</div>
													<div>
														<div class="last-chat-time block">{{Carbon\Carbon::parse($ticket->created_at)->diffForHumans()}}</div>

														@if($ticket->ticket_status == 'active')
												<div class="badge badge-success badge-pill">{{$ticket->ticket_status}}</div>

													@else

														<div class="badge badge-danger badge-pill">{{$ticket->ticket_status}}</div>

													
													@endif
											
													</div>
												</div>
											</a>
											
											
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
								
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header" style="background: lightgreen;" >
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
													@if($ticket->ticket_status == 'active')
													<div class="avatar avatar-online">
													@else
													<div class="avatar avatar-offline">
													@endif
													<img src="{{ asset('assets/img/staffimage/'.auth()->guard('staff')->user()->profile_picture) }}" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">{{'#'.$ticket->ticket_id}}</div>

												@if($ticket->ticket_status == 'active')
												<div class="user-status">online</div>
												@else
												<div class="user-status">closed</div>
												@endif
											</div>
										</div>
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
									<div class="input-group-prepend">
												<div class="msg-typing">
												
																	<span></span>
																	<span></span>
																	<span></span>

																</div>
											</div>

								<input type="hidden" name="msg_ticket_id" id="msg_ticket_id" value="{{$ticket->ticket_id}}">
								<input type="hidden" name="row_id" id="row_id" value="{{$ticket->h_d_id}}">
								<textarea rows="1" class="input-msg-send form-control" placeholder="Reply" id="msg"></textarea>
											<div class="input-group-append">
												<button type="button" class="btn msg-send-btn" id="msg_button" ><i class="fab fa-telegram-plane"></i></button>
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

			<!-- /Page Content -->

@endforeach


@endsection