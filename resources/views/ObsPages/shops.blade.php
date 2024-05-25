@extends('ObsLayouts.app')
@section('content')

<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('obs.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Market</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Shops</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->




			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->						@include('ObsInc.sider')
							<!-- /Profile Sidebar -->
							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">

					<div class="card">
						<div class="card-body">
							<input type="text" name="shop_name" id="shop_name" placeholder="Search with either: Shop Name or Shop Unique ID" class="form-control">
					<div class="row row-grid" id="shops_list">


					</div>
							
						</div>
						
					</div>
				
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->




	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
			<script type="text/javascript">
				$(document).ready(function(){

var _tokens = $('input[name=_token]').val();

LoadShops();
   function LoadShops(shop_name=''){



    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('obs.fetchshops')}}",
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

     	if (value.shop_account_status == 'active') {

     		var tool = '<button class="btn btn-danger btn-sm" data-id="'+value.shop_id+'" id="deactivate_shop_btn"><i class="fa fa-trash" style="color: #fff;" ></i> Deactivate</button>';
     	}else{

     		var tool = '<button class="btn btn-success btn-sm" data-id="'+value.shop_id+'" id="activate_shop_btn"><i class="fa fa-pen" style="color: #fff;" ></i> Activate</button>';
     	}

var shops_list = '<div class="col-md-6 col-lg-4 col-xl-3"><div class="card widget-profile pat-widget-profile"><div class="card-body"><div class="pro-widget-content"><div class="profile-info-widget"><a href="/assets/img/shopimage/'+value.shop_image+'" class="booking-doc-img"><img src="/assets/img/shopimage/'+value.shop_image+'" alt="User Image"></a><div class="profile-det-info"><h3>'+value.shop_name+'</h3><div class="patient-details"><h5><b>Shop Unique ID :</b> '+value.shop_auth_id+'</h5><h5 class="mb-0"><i class="fas fa-user"></i>'+value.state_code+' : '+value.name+'</h5><h5 class="mb-0"><i class="fas fa-user"></i> '+value.year+', Batch: '+value.batch+', Stream: '+value.stream+' </h5></div></div></div></div><div class="patient-info"><ul><li>Phone: <span>'+value.shop_phone_number+'</span></li><li>Account Status: <span>'+value.shop_account_status+'</span></li><li>Action: <span>'+tool+'</span></li></ul></div></div></div></div>';

    $('#shops_list').append(shops_list);



      });

 }
      
        }
})

 }




$("#shop_name").keyup(function(){
    var shop_name = $(this).val();
   
   LoadShops(shop_name);

 });



$("#shop_name").bind("change keyup", function(event){
    var shop_name = $(this).val();
   
   LoadShops(shop_name);

 });





$('body').delegate('#activate_shop_btn', 'click', function(e){

    e.preventDefault();
   
    var shop_id = $(this).data('id');

    if (confirm("Are you sure? Clicking Ok means a thousand naira has been paid to you for account activation.")) {



$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.activateshop')}}",
		method:"POST",
		data:{shop_id:shop_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	 LoadShops();
    $('.overlay').hide();
			
		}


	})


    }


    

});




$('body').delegate('#deactivate_shop_btn', 'click', function(e){

    e.preventDefault();
   
    var shop_id = $(this).data('id');

    if (confirm("Are you sure? ")) {



$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deactivateshop')}}",
		method:"POST",
		data:{shop_id:shop_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	 LoadShops();
    $('.overlay').hide();
			
		}


	})


    }


    

});
























				});
			</script>






@include('ObsInc.changepassword')
@endsection			