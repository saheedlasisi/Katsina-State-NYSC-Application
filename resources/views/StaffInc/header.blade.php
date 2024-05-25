<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{route('staff.dashboard')}}" class="navbar-brand logo">
							<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{route('staff.dashboard')}}" class="menu-logo">
								<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="{{route('staff.dashboard')}}">Dashboard</a>
							</li>
							
							<li>
								<a href="{{route('staff.hostelallocation')}}">Hostel Allocation </a>
							
							</li>
							
							<li >
								<a href="{{route('staff.profilesettings')}}">Profile Settings </a>
							
							</li>

							
							
							<li class="login-link">
								<a href="{{ route('staff.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													Logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a>
							</li>
						</ul>	 
					</div>		 
					<ul class="nav header-navbar-rht">
					<!-- 	<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
						</li> -->
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{ asset('assets/img/staffimage/'.auth()->guard('staff')->user()->profile_picture) }}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{ asset('assets/img/staffimage/'.auth()->guard('staff')->user()->profile_picture) }}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{auth()->guard('staff')->user()->name}}</h6>
										<p class="text-muted mb-0">{{auth()->guard('staff')->user()->position}}</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{route('staff.dashboard')}}">Dashboard</a>
								<a class="dropdown-item" href="{{route('staff.profilesettings')}}">Profile Settings</a>

								<a class="dropdown-item" href="{{ route('staff.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a>



							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->