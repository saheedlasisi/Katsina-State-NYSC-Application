<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="/myprofile/{{auth()->user()->name}}/{{auth()->user()->id}}" class="booking-doc-img">
											<img src="{{ asset('assets/img/corperimage/'.auth()->user()->profile_pic) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<a href="/myprofile/{{auth()->user()->name}}/{{auth()->user()->id}}"><h3>{{auth()->user()->name}}</h3></a>
											<div class="patient-details">
												<h5><i class="fas fa-user"></i> {{auth()->user()->state_code	}}</h5>
												
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="/dashboard">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
										
											<li>
												<a href="/chats">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													@if(count($count_msg) > 0)
								<small class="unread-msg">{{count($count_msg)}}</small>
													@else

													@endif
													
												</a>
											</li>
											<li>
												<a href="/editmyprofile/{{auth()->user()->name}}/{{auth()->user()->id}}">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="javascript:void(0);" id="change_password_btn">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
										
										</ul>
									</nav>
								</div>

							</div>
						</div>