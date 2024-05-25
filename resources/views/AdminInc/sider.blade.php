<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							@if($title == 'Dasboard')
							<li class="active"> 
								<a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							@else
								<li> 
								<a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							@endif

							@if($title == 'Obs')
							<li class="active">  
								<a href="{{route('admin.obs')}}"><i class="fe fe-layout"></i> <span>Staff</span></a>
							</li>
								@else
								<li> 
								<a href="{{route('admin.obs')}}"><i class="fe fe-layout"></i> <span>Staff</span></a>
							</li>	
							@endif
							
							<li> 
								<a href="settings.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->