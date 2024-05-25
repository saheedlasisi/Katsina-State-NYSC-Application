@extends('MainLayouts.app')
@section('content')

<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Help Desk</h1>
							<p>Here you can browse your help ticket.</p>
						</div>
                         
                         <div class="row">
                         	<div class="col-md-2"></div>
                         	<div class="col-md-8">
                         		<div class="search-box">
							<form action="/trackticket" method="POST" id="trackticket_form">
								{{csrf_field()}}
								<div class="form-group search-info">
									<input type="text" name="track_ticket_id" id="track_ticket_id" class="form-control" placeholder="Enter your Ticket ID here : (E.g, Rtb-787-3434)">
									<span class="form-text">Eg : Rtb-787-3434</span>
								</div>

								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Browse</span></button>
							</form>
						</div></div>
                         	<div class="col-md-4"></div>
						<!-- Search -->
						
						</div>
						<!-- /Search -->
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->


@endsection