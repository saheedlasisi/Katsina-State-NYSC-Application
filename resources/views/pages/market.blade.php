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
									<li class="breadcrumb-item active" aria-current="page">Market</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">market</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->










			<!-- Page Content -->
			<div class="content">
		<div class="container-fluid">

						<!-- Popular Section -->
			<section class="section section-docto">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Welcome </h2>
								<p>to Katsina State Nysc Market</p>
								<p>Market,is a means by which the exchange of goods and services takes place as a result of buyers and sellers being in contact with one another, either directly or through mediating agents or institutions. This system provide a strong strictly platform to make that happen. <b>Happy Chopping.....</b></p>
								<p>
									<div class="about-content">
												
								<a href="javascript:void(0);" class="btn btn-success btn-sm" id="create_a_shop">Create a shop</a> <a href="/shops" class="btn btn-primary btn-sm">See more</a>
							</div>
							</div>
							
						</div>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
							@if(count($shops) > 0)

							@foreach($shops as $shop)
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="/shop/{{$shop->shop_name}}/{{$shop->shop_id}}">
											<img class="img-fluid" alt="User Image" src="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}">
										</a>
										<a href="{{ asset('assets/img/shopimage/'.$shop->shop_image) }}" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
										<a href="/shop/{{$shop->shop_name}}/{{$shop->shop_id}}">{{$shop->shop_name}}</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{$shop->shop_specialist}}</p>
										<div class="rating">

											<?php  

											$like = $shop->shop_like;
											$view = $shop->shop_view;

											$total = $like + $view;

											$rate = $total / 5;

											if ($rate > 0 && $rate < 1) {

											echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 1) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 1 && $rate < 2) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 2 ) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 2 && $rate < 3) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 3) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 3 && $rate < 4) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											}elseif ($rate == 4) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate > 4 && $rate < 5) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';
											}elseif ($rate >= 5) {
												echo '<i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
											}else{


											}

											?>
											<span class="d-inline-block average-rating">({{$shop->shop_like + $shop->shop_view}})</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> {{$shop->shop_address}}
											</li>
											<li>
												<i class="far fa-clock"></i> Available From {{$shop->shop_open_hour}}, To {{$shop->shop_closing_hour}}
											</li>
											<li>

												@if($shop->id == auth()->user()->id)
												<i class="far fa-user"></i> You
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Own By: You"></i>
												@else
												<i class="far fa-user"></i> {{$shop->name}}
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Own By: {{$shop->name}}"></i>
												@endif
												
											</li>
										</ul>
										<div class="col-12">
									<a href="/shop/{{$shop->shop_name}}/{{$shop->shop_id}}" class="btn view-btn">Visit Shop</a>
											</div>
										
									</div>
								</div>
								<!-- /Doctor Widget -->
								@endforeach
						
								@else
								<center><h6>NO RECORD FOUND</h6></center>

								@endif
								
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->




					<div class="row">
						<div class="col-md-5 col-lg-3 col-xl-3 theiaStickySidebar">
							
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<label>Search</label>
									<input type="text" class="form-control" id="search_product_name" placeholder="Product Name or Description">
								</div>
									
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-7 col-lg-9 col-xl-9">

							<div class="row align-items-center pb-3">	
								<div class="col-md-4 col-12 d-md-block d-none custom-short-by">
									
								
								</div>
								<div class="col-md-8 col-12 d-md-block d-none custom-short-by">
									<div class="sort-by pb-3">
										<span class="sort-title">Filter by shop name</span>
										<span class="sortby-fliter">
											<select class="select" id="select_shop_name">
												
												@if(count($shops) > 0)
												<option value="">Select</option>
												@foreach($shops as $shop)
												<option value="{{$shop->shop_name}}">{{$shop->shop_name}}</option>
												@endforeach
												@else
												<center><h6>NO RECORD FOUND</h6></center>

												@endif
												
											</select>
										</span>
									</div>
								</div>
							</div>

							<div class="row" id="list_products">

								
                            	
                            	
                            	

                             </div>
                            
						</div>
					</div>
				</div>
			</div>



<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();

	getProducts();
	function getProducts(product_name="", shop_name=""){


		$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchproducts')}}",
        method:"POST",
        data:{product_name:product_name,shop_name:shop_name,_tokens:_tokens},
        success:function(data){

        console.log(data)

$('#list_products').empty();
        if (data == '') {
$('#list_products').empty();
          var list_products = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#list_products').append(list_products);

        }else{

             $('#list_products').empty();
     $.each(data, function(i, value){

var my_id = <?php echo auth()->user()->id;?>;
     
     	if (my_id == value.user_id) {

     	
     	var tool = '<a href="/editproduct/'+value.product_name+'/'+value.shop_product_id+'" class="cart-icon"><i class="fas fa-pen"></i></a>';

     	}else{

     		var tool = '<a href="javascript:void(0)" class="cart-icon" id="cart_btn" data-id="'+value.shop_product_id+'" data-name="'+value.product_name+'" data-status="'+value.product_status+'" data-current="'+value.current_price+'" data-old="'+value.old_price+'" data-qty="'+value.product_qty+'"><i class="fas fa-shopping-cart"></i></a>';	


     	}	

var list_products = '<div class="col-md-12 col-lg-4 col-xl-4 product-custom"><div class="profile-widget"><div class="doc-img"><a href="/product/'+value.product_name+'/'+value.shop_product_id+'" tabindex="-1"><img class="img-fluid" alt="Product image" src="/assets/img/shopimage/'+value.product_image+'"></a><a href="javascript:void(0)" class="fav-btn" tabindex="-1"><i class="far fa-bookmark"></i></a></div><div class="pro-content"> <a href="/shop/'+value.shop_name+'/'+value.shop_id+'"><div class="avatar avatar-xs"><img class="avatar-img rounded-circle" alt="User Image" src="/assets/img/shopimage/'+value.shop_image+'"></div></a> <font size="4"><a href="/product/'+value.product_name+'/'+value.shop_product_id+'" tabindex="-1">'+value.product_name+'</a></font><div class="row align-items-center"><div class="col-lg-6"><span class="price"><s>N</s>'+addCommas(value.current_price)+'</span> <br /><span class="price-strike">N'+addCommas(value.old_price)+'</span></div><div class="col-lg-6 text-right">'+tool+'</div></div></div></div></div>';

    $('#list_products').append(list_products);



      });


        }


      
        
            
        }


    })

	}




$("#search_product_name").keyup(function(){
    var search_product_name = $(this).val();
    var select_shop_name = $('#select_shop_name').val();
   
   getProducts(search_product_name, select_shop_name);

 });



$("#search_product_name").bind("change keyup", function(event){
    var search_product_name = $(this).val();
   var select_shop_name = $('#select_shop_name').val();
   getProducts(search_product_name, select_shop_name);

 });


$("#select_shop_name").keyup(function(){
    var select_shop_name = $(this).val();
    var search_product_name = $('#search_product_name').val();
   
   getProducts(search_product_name, select_shop_name);

 });



$("#select_shop_name").bind("change keyup", function(event){
    var select_shop_name = $(this).val();
   var search_product_name = $('#search_product_name').val();
   getProducts(search_product_name, select_shop_name);

 });



	function addCommas(nStr){

		nStr +='';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while(rgx.test(x1)){
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}






	});
</script>			



@include('inc.changepassword')
@include('inc.cart')
@include('inc.createshop')
@endsection
