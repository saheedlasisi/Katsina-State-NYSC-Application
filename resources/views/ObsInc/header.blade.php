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
						<a href="{{route('obs.dashboard')}}" class="navbar-brand logo">
							<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{route('obs.dashboard')}}" class="menu-logo">
								<img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">

						
							

							@if($title == 'Blog')
							<li class="active">
								<a href="{{route('obs.blog')}}">Blog</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.blog')}}">Blog</a>
							</li>
							@endif


							@if($title == 'Information')
							<li class="active">
								<a href="{{route('obs.information')}}">Information</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.information')}}">Information</a>
							</li>
							@endif


							@if($title == 'Lectures')
							<li class="active">
								<a href="{{route('obs.lectures')}}">Lecture</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.lectures')}}">Lecture</a>
							</li>
							@endif

							@if($title == 'Saed Master Registration')
							<li class="active">
								<a href="{{route('obs.registersaedmaster')}}">SAED</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.registersaedmaster')}}">SAED</a>
							</li>
							@endif



							@if($title == 'Cds Project')
							<li class="active">
								<a href="{{route('obs.cds')}}">CDs</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.cds')}}">CDs</a>
							</li>
							@endif



								@if($title == 'CorpsMembers')
							<li class="active">
								<a href="{{route('obs.corpsmembers')}}">CorpsMember</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.corpsmembers')}}">CorpsMember</a>
							</li>
							@endif



								@if($title == 'Slide')
							<li class="active">
								<a href="{{route('obs.slide')}}">Slide</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.slide')}}">Slide</a>
							</li>
							@endif


								@if($title == 'Shops')
							<li class="active">
								<a href="{{route('obs.shops')}}"> Shops</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.shops')}}"> Shops</a>
							</li>
							@endif
							


									@if($title == 'Saed Session')
							<li class="active">
								<a href="{{route('obs.session')}}">Session</a>
							</li>
							@else
							<li>
								<a href="{{route('obs.session')}}">Session</a>
							</li>
							@endif
							
						
							
							
						


							<li class="login-link">
								<a href="{{ route('obs.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													Logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('obs.logout') }}" method="POST" style="display: none;">
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
									<img class="rounded-circle" src="{{asset('assets/img/obsimage/'.auth()->guard('obs')->user()->image)}}" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('assets/img/obsimage/'.auth()->guard('obs')->user()->image)}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{auth()->guard('obs')->user()->name}}</h6>
										<p class="text-muted mb-0">{{auth()->guard('obs')->user()->state_code}}</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{route('obs.dashboard')}}">Dashboard</a>
								<a class="dropdown-item" href="{{route('obs.profilesetting')}}">Profile Settings</a>
								<a class="dropdown-item" href="{{ route('obs.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
													logout
												{{csrf_field()}}
												<form id="logout-form" action="{{ route('obs.logout') }}" method="POST" style="display: none;">
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