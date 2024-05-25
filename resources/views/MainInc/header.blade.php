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
						<a href="/" class="navbar-brand logo">
							<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="/" class="menu-logo">
								<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">

							@if($title == 'Home')
							<li class="active">
								<a href="/">Home</a>
							</li>
							@else
							<li class="">
								<a href="/">Home</a>
							</li>
							@endif
							
							
						
							
							@if($title == 'Blog')
							<li class="active">
								<a href="/bloglist">Blog </a>
								
							</li>
							@else
							<li>
								<a href="/bloglist">Blog </a>
								
							</li>
							@endif

						


								@if($title == 'Cds Project')
							<li class="active">
								<a href="/cdsproject">Transportation </a>
								
							</li>
							@else
							<li>
								<a href="/cdsproject">Cds Project</a>
								
							</li>
							@endif


							





							
							<li class="has-submenu">
								<a href="#">Help Desk <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">

									@if($title == 'Help Desk')
							<li class="active">
								<a href="/helpdesk" >Help Desk</a>
								
							</li>
							@else
							<li>
								<a href="/helpdesk" >Help Desk</a>
								
							</li>
							@endif


									@if($title == 'Open Ticket')
							<li class="active">
						<a href="/browseticket" >Open a ticket</a>
						</li>
								
							
							@else
							<li>
								<a href="/browseticket" >Open a ticket</a>
								
							</li>
							@endif

									
									
								</ul>
							</li>


								@guest
								<li class="login-link">
								<a href="{{route('login')}}">Login / Signup</a>
							</li>
								@else
								<li class="login-link">
								<a href="/dashboard">Dashboard</a>
							</li>

								<li class="login-link">
									<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													Logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a>
							</li>

								@endguest



							
						</ul>		 
					</div>	@guest
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +234 7033 663 515</p>
							</div>
						</li>
						
						<li class="nav-item">
							<a class="nav-link header-login" href="/login">login / Signup </a>
						</li>
					</ul>
								@else
								<ul class="nav header-navbar-rht">
					
						
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('assets/img/corperimage/'.auth()->user()->profile_pic)}}" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('assets/img/corperimage/'.auth()->user()->profile_pic)}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{auth()->user()->name}}</h6>
										<p class="text-muted mb-0">{{auth()->user()->state_code}}</p>
									</div>
								</div>
								<a class="dropdown-item" href="/dashboard">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
								<a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{csrf_field()}}
                                        </form>
											</a>
							</div>
						</li>
						<!-- /User Menu -->
						
					</ul>
								@endguest	 
					
				</nav>
			</header>
			<!-- /Header -->