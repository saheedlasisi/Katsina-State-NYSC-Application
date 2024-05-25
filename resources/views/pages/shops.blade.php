@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Market</a></li>
									<li class="breadcrumb-item active" aria-current="page">shops</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Shops</h2>
						</div>


						<!-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> -->




					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->




<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search / <a href="javascript:void(0);" class="btn btn-success btn-sm" id="create_a_shop">Create a shop</a></h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<label>Search</label>
									<input type="text" class="form-control" id="search_shop_name" placeholder="Shop Name or Address or Specialization">
								</div>
								
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9" id="shops_list">

							<!-- Doctor Widget -->
							
							<!-- /Doctor Widget -->

							

							
						</div>


					</div>

				</div>

			</div>		
			<!-- /Page Content -->


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();

		getShops();
	function getShops(shop_name=""){


		$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchshops')}}",
        method:"POST",
        data:{shop_name:shop_name,_tokens:_tokens},
        success:function(data){

        //console.log(data)

$('#shops_list').empty();
        if (data == '') {
$('#shops_list').empty();
          var shops_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#shops_list').append(shops_list);

        }else{

             $('#shops_list').empty();
     $.each(data, function(i, value){

     var my_id = <?php echo auth()->user()->id;?>;
     
     	if (my_id == value.user_id) {

     	var tool = '<a class="apt-btn" href="/editshop/'+value.shop_name+'/'+value.shop_id+'">Update Shop</a>';	

     	}else{

     		var tool = '<a class="apt-btn" href="javascript:void()" id="send_shop_message_btn">Message</a>';	


     	}	



     	var like = value.shop_like;
		var view = value.shop_view;
		var total = like + view;
		var rate = total / 5;

		if (rate > 0 && rate < 1) {

	var star =  '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
	}else if (rate == 1) {

	var star =  '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
	
	}else if (rate > 1 && rate < 2) {
	
	var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											
}else if (rate == 2 ) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
											
}else if (rate > 2 && rate < 3) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

}else if (rate == 3) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

}else if (rate > 3 && rate < 4) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';

}else if (rate == 4) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

}else if (rate > 4 && rate < 5) {

var star = '<span class="badge badge-primary">'+rate+'</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star"></i>';

}else if (rate >= 5) {

var star = '<span class="badge badge-primary">5</span> <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>';
											}else{


											}



var shops_list = '<div class="card"><div class="card-body"><div class="doctor-widget"><div class="doc-info-left"><div class="doctor-img1"><a href="/shop/'+value.shop_name+'/'+value.shop_id+'"><img src="/assets/img/shopimage/'+value.shop_image+'" class="img-fluid" alt="User Image" style="width: 400px"></a></div><br /><div class="doc-info-cont"><h4 class="doc-name mb-2"><a href="/shop/'+value.shop_name+'/'+value.shop_id+'">'+value.shop_name+'</a></h4><div class="rating mb-2">'+star+'<span class="d-inline-block average-rating">('+(value.shop_like +  value.shop_view)+')</span></div><div class="clinic-details"><div class="clini-infos pt-3"><p class="doc-location mb-2"><i class="fas fa-phone-volume mr-1"></i> '+value.shop_phone_number+'</p><p class="doc-location mb-2 text-ellipse"><i class="fas fa-map-marker-alt mr-1"></i> '+value.shop_address+' </p><p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> '+value.shop_specialist+'</p><p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i> Opens at '+value.shop_open_hour+'</p><p class="doc-location mb-2"><i class="fas fa-chevron-right mr-1"></i>Closes at '+value.shop_closing_hour+'</p></div></div></div></div><div class="doc-info-right"><div class="clinic-booking"><a class="view-pro-btn" href="/shop/'+value.shop_name+'/'+value.shop_id+'">View Details</a>'+tool+'</div></div></div></div></div>';

    $('#shops_list').append(shops_list);



      });


        }


      
        
            
        }


    })



	} 		



$("#search_shop_name").keyup(function(){
    var search_shop_name = $(this).val();
   
   getShops(search_shop_name);

 });



$("#search_shop_name").bind("change keyup", function(event){
    var search_shop_name = $(this).val();
   
   getShops(search_shop_name);

 });














	});
</script>






@include('inc.createshop')
@endsection
