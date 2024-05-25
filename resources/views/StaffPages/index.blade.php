@extends('StaffLayouts.app')
@section('content')
	<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('staff.dashboard')}}">Staff</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



@include('StaffInc.message')



			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<!-- <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							
							
						</div> -->
						
						<div class="col-md-12 col-lg-12 col-xl-12">
							<!-- class="col-md-7 col-lg-8 col-xl-9" -->
							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="{{ asset('assets/img/icon-01.png')}}" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Incoming HelpDesk Tickets</h6>
															<h3>{{count($incomings)}}</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="{{ asset('assets/img/icon-02.png')}}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Closed Tickets</h6>
															<h3>{{count($closed_ticket)}}</h3>
															<p class="text-muted">Till Date</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{ asset('assets/img/icon-03.png')}}" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Active Tickets</h6>
															<h3>{{count($active_ticket)}}</h3>
															<p class="text-muted">Till Date</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Help Desk</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Tickets</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-toggle="tab">Incoming</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
	<div class="tab-pane show active" id="upcoming-appointments">
		<div class="card card-table mb-0">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Ticket</th>
								<th>Name</th>
								<th>Subject</th>
								<th>Status</th>
								<th>Unread</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
																	
																	
																	
															
					@if(count($tickets) > 0)
					<?php $no = 1;?>

					@foreach($tickets as $ticket)

					@if($ticket->staff_notify > 0)
						<tr style="background: #FF3366; color: #fff;">
					<td>
						<h2 class="table-avatar" style="color: #fff;">
						{{$no}}
					</h2>
					</td>
					<td style="color: #fff;">
					{{$ticket->ticket_id}}
					</td>
					<td>
						<h2 class="table-avatar" style="color: #fff;">
						{{$ticket->name}}
						</h2>
					</td>
					
					<td style="color: #fff;">{{$ticket->subject}}</td>
					<td style="color: #fff;">{{$ticket->ticket_status}}</td>
					<td><div class="badge badge-primary badge-pill">{{$ticket->staff_notify}}</div></td>
					<td class="text-right">
					<div class="table-action">
																				
																				
					<a href="javascript:void(0);" class="btn btn-success" data-id="{{$ticket->ticket_id}}"  id="reply_btn" >
					<i class="fas fa-comments"></i> Reply</a>
																				
						</div>
				</td>
			</tr>

					@else 


					<tr>
					<td>
						<h2 class="table-avatar">
						{{$no}}
					</h2>
					</td>
					<td>
					{{$ticket->ticket_id}}
					</td>
					<td>
						<h2 class="table-avatar">
						{{$ticket->name}}
						</h2>
					</td>
					
					<td>{{$ticket->subject}}</td>
					<td>{{$ticket->ticket_status}}</td>
					<td><div class="badge badge-success badge-pill">{{$ticket->staff_notify}}</div></td>
					<td class="text-right">
					<div class="table-action">
																				
																				
					<a href="javascript:void(0);" class="btn btn-sm bg-warning-light" data-id="{{$ticket->ticket_id}}"  id="reply_btn" >
					<i class="fas fa-comments"></i> Reply</a>
																				
						</div>
				</td>
			</tr>


					@endif

					
<?php $no++;?>
					@endforeach
					@else

					<center><h2>NO RECORD FOUND</h2></center>

					@endif			
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
			<div class="tab-pane" id="today-appointments">
			<div class="card card-table mb-0">
			<div class="card-body">
			<div class="table-responsive">
			<table class="table table-hover table-center mb-0">
			<thead>
			<tr>
			<th>#</th>
			<th>Ticket</th>
			<th>Name</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Status</th>
			<th class="text-center">Date && TIme</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
																	
					@if(count($incomings) > 0)
					<?php $no = 1;?>

					@foreach($incomings as $income)

					<tr>
					<td>
						<h2 class="table-avatar">
						{{$no}}
					</h2>
					</td>
					<td>
					{{$income->ticket_id}}
					</td>
					<td>
						<h2 class="table-avatar">
						{{$income->name}}
						</h2>
					</td>
					<td>{{$income->email}}</td>
					<td>{{$income->subject}}</td>
					<td>{{$income->ticket_status}}</td>
					<td class="text-center">{{date('d M Y', strtotime($income->created_at))}} <span class="d-block text-info">{{date('h:i A', strtotime($income->created_at))}}</span></td>
					<td class="text-right">
					<div class="table-action">
																				
																				
					<a href="javascript:void(0);" class="btn btn-sm bg-success-light" data-id="{{$income->ticket_id}}" data-row="{{$income->h_d_id}}" id="start_btn" >
					<i class="fas fa-comments"></i> Start Chat</a>
																				
						</div>
				</td>
			</tr>
<?php $no++;?>
					@endforeach
					@else

					<center><h2>NO RECORD FOUND</h2></center>

					@endif												
																	
					</tbody>
				</table>		
			</div>	
		</div>	
	</div>	
</div>
			<!-- /Today Appointment Tab -->
											
			</div>
		</div>
	</div>
</div>

			</div>
		</div>

	</div>
	</div>		
<!-- /Page Content -->
   


			



@endsection