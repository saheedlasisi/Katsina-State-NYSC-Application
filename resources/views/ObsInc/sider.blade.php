<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="{{ asset('assets/img/obsimage/'.auth()->guard('obs')->user()->image) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>{{auth()->guard('obs')->user()->name}}</h3>
											<div class="patient-details">
												<h5><i class="fas fa-user"></i> Obs</h5>
												
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											@if($title == 'Dashboard')
											<li class="active">
												<a href="{{route('obs.dashboard')}}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											@else
											<li>
												<a href="{{route('obs.dashboard')}}">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											@endif

											@if($title == 'Profile Setting')
											<li class="active">
												<a href="{{route('obs.profilesetting')}}">
													<i class="fa fa-pen"></i>
													<span>Profile Setting</span>
												</a>
											</li>
											@else
											<li>
												<a href="{{route('obs.profilesetting')}}">
													<i class="fa fa-pen"></i>
													<span>Profile Setting</span>
												</a>
											</li>
											@endif


											<li>
												<a href="javascript:void(0);" id="change_password_btn">
													<i class="fa fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>


											
											
											
											<li>
												<a class="dropdown-item" href="{{ route('obs.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('obs.logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a>
												
											</li>
										</ul>
									</nav>
								</div>

							</div>