
@foreach($msgs as $msg)


@endforeach






<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p id="user_messge">Hello. What can I do for you?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span id="user_time">8:30 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												
										
												<li class="media received" id="staff_msgs">
													<div class="avatar">
														<img src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>You wait for notice.</p>
																<p>Consectetuorem ipsum dolor sit?</p>
																<p>Ok?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:55 PM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>