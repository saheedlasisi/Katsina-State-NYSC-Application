@extends('layouts.app')
@section('content')

<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashbord</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->







<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">

						<div class="col-md-7 col-lg-9 col-xl-9">
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body product-description">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img1">
													<img src="{{asset('assets/img/shopimage/'.$product->product_image) }}" class="img-fluid" alt="User Image">
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name mb-2" style="font-size: 30px;">{{$product->product_name}}</h4>

												<div class="rating mb-2">
											<?php  

											

											$rate = $product->love / 5;

											if ($rate > 0 && $rate < 1) {

											echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 1) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 1 && $rate < 2) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 2 ) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 2 && $rate < 3) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 3) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 3 && $rate < 4) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 4) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 4 && $rate < 5) {
												echo '<span class="badge badge-primary">'.$rate.'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate >= 5) {
												echo '<span class="badge badge-primary">5</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
											}else{


											}

											?>
											<span class="d-inline-block average-rating">({{$product->love}})</span>
										</div>
										<span style="font-size: 20px;">Status: @if($product->product_status == 'available') <span class="badge badge-success"> {{$product->product_status}} ({{$product->product_qty}})</span> @else <span class="badge badge-danger">{{$product->product_status}}</span> @endif </span>

												<hr />

													<div class="row align-items-center">
												<div class="col-lg-6">
													<span class="price" style="font-size: 40px;"><s>N</s>{{number_format($product->current_price)}}</span>

													<br />
													<span class="price-strike" style="font-size: 20px; color: lightgray;"><s>N${{number_format($product->old_price)}}</s></span> <span class="light-danger" style="background: pink; color: #000; font-weight: 700;"><?php $per = $product->old_price - $product->current_price; echo '-'.round(($per / $product->old_price) * 100).'%';?></span>
												</div>
												@if(count($love) > 0)
												@foreach($love as $lov)
												<div class="col-lg-6 text-right">
													<a href="javascript:void(0);" class="cart-icon" id="unlove_product_btn" data-id="{{$product->shop_product_id}}"><i class="fas fa-heart" style="color: red; font-size: 50px;"></i></a>
												</div>
												@endforeach
												@else
												<div class="col-lg-6 text-right">
													<a href="javascript:void(0);" class="cart-icon" id="love_product_btn" data-id="{{$product->shop_product_id}}"><i class="fas fa-heart" style="color: grey; font-size: 50px;"></i></a>
												</div>
												@endif
											</div>

												<p><a href="javascript:void(0);" class="btn btn-success btn-sm" style="font-weight: 700;" id="cart_btn" data-id="{{$product->shop_product_id}}" data-name="{{$product->product_name}}" data-status="{{$product->product_status}}" data-current="{{$product->current_price}}" data-old="{{$product->old_price}}" data-qty="{{$product->product_qty}}"><i class="fas fa-shopping-cart" style="color: #fff;"></i> Buy</a></p>
											
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
							<!-- /Doctor Widget -->
							
							<!-- Doctor Details Tab -->
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
										<h3 class="pt-4">Product Details</h3>
										<hr>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-3">
									
										<!-- Overview Content -->
										<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
											<div class="row">
												<div class="col-md-9">
												
													<!-- About Details -->
													<div class="widget about-widget">
														<h4 class="widget-title">Description</h4>
														{!! $product->description !!}
													</div>
													<!-- /About Details -->
												
														

		<!-- Awards Details -->
						<div class="widget awards-widget">
							<h4 class="widget-title">Specification</h4>
		<p>{!! $product->specification !!}</p>
						</div>
						<!-- /Awards Details -->


					<!-- Awards Details -->
					<div class="widget awards-widget">
						<h4 class="widget-title">Key Feature</h4>
	<p>{!! $product->key_feature !!}</p>
					</div>
					<!-- /Awards Details -->


							<!-- Awards Details -->
							<div class="widget awards-widget">
								<h4 class="widget-title">What's in the Box</h4>
			<p>{{ $product->product_name }}</p>
							</div>
							<!-- /Awards Details -->											




												</div>
											</div>
										</div>
										<!-- /Overview Content -->
										
									</div>
								</div>
							</div>
							<!-- /Doctor Details Tab -->

						</div>

						<div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">
							
							<!-- Right Details -->
						
							<div class="card search-filter">
								<div class="card-body">
									<div class="card flex-fill mt-0 mb-0">
										<ul class="list-group list-group-flush benifits-col">
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-shipping-fast"></i>
												</div>
												<div>
													Free Shipping<br><span class="text-sm">For orders from $50</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="far fa-question-circle"></i>
												</div>
												<div>
													Support 24/7<br><span class="text-sm">Call us anytime</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-hands"></i>
												</div>
												<div>
													100% Safety<br><span class="text-sm">Only secure payments</span>
												</div>
											</li>
											<li class="list-group-item d-flex align-items-center">
												<div>
													<i class="fas fa-tag"></i>
												</div>
												<div>
													Hot Offers<br><span class="text-sm">Discounts up to 90%</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /Right Details -->
							
						</div>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   




@include('inc.cart')
@endsection