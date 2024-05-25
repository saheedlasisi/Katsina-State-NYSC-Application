@extends('MainLayouts.app')
@section('content')
	<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="/">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Help Desk</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Sumbit a Ticket</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->


			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/helpdesk/helpdesk3.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right shadow" style="background: lightgreen; border-radius: 20px; margin-bottom: 20px;">
										@include('MainInc.message')
										<div class="login-header">
											<h3>Submit <span>Help</span></h3>
										</div>
										<form action="/deliverticket" method="POST">
											{{csrf_field()}}
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="name" id="name" placeholder="Enter your Full Name Here" required >
												<label class="focus-label">Full Name</label>
											</div>

											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email" id="email" placeholder="Enter your Valid email address here" required >
												<label class="focus-label">Email</label>
											</div>

												<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="subject" id="subject" placeholder="Help Subject" required >
												<label class="focus-label">Subject</label>
											</div>


											<div class="form-group ">
												
												<!-- <label class="focus-label">Email</label> -->
												<textarea class="form-control" rows="6" cols="9" name="message" id="message" placeholder="Type your message here" required ></textarea>

												
											</div>

											
											
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Submit</button>
											
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->



@endsection