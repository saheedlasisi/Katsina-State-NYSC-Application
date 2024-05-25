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
							<li class="active">
								<a href="/dashboard">Dashboard</a>
							</li>
							
						
							<li >
								<a href="/saeds">SAED</a>
							</li>

							<li class="has-submenu">
								<a href="/bloglist">Blog</a>
							</li>

							<li >
								<a href="/corpsmembers">Corps Members</a>
							</li>

							<li >
								<a href="/chats">Chats</a>
							</li>


							<li >
								<a href="/market">Market</a>
							</li>
							
						

							<li class="has-submenu">
								<a href="/">Main Site</a>
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
						</ul>
					</div>
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
								<a class="dropdown-item" href="/editmyprofile/{{auth()->user()->name}}/{{auth()->user()->id}}">Profile Settings</a>
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
				</nav>
			</header>
			<!-- /Header -->