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
									<li class="breadcrumb-item active" aria-current="page">Saed</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Session</h2>
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
							<input type="text" name="session_id" id="session_id" placeholder="Search with: Session Unique ID" class="form-control">
					<div class="row row-grid" id="session_list">


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

LoadSession();
   function LoadSession(session_id=''){



    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('obs.fetchsession')}}",
        method:"POST",
        data:{session_id:session_id,_tokens:_tokens},
        success:function(data){

        //console.log(data)

$('#session_list').empty();
        if (data == '') {
$('#session_list').empty();
          var session_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#session_list').append(session_list);

        }else{

             $('#session_list').empty();
     $.each(data, function(i, value){

     	if (value.session_status == 'active') {

     		var tool = '<button class="btn btn-danger btn-sm" data-id="'+value.saed_session_id+'" id="deactivate_session_btn"><i class="fa fa-trash" style="color: #fff;" ></i> Deactivate</button>';
     	}else{

     		var tool = '<button class="btn btn-success btn-sm" data-id="'+value.saed_session_id+'" id="activate_session_btn"><i class="fa fa-pen" style="color: #fff;" ></i> Activate</button>';
     	}

var session_list = '<div class="col-md-6 col-lg-4 col-xl-3"><div class="card widget-profile pat-widget-profile"><div class="card-body"><div class="pro-widget-content"><div class="profile-info-widget"><a href="/assets/img/saedimage/'+value.image+'" class="booking-doc-img"><img src="/assets/img/saedimage/'+value.image+'" alt="User Image"></a><div class="profile-det-info"><h3>'+value.saed_title+'</h3><div class="patient-details"><h5><b>ID :</b> '+value.session_id+'</h5><h5 class="mb-0"><i class="fas fa-user"></i>'+value.name+'</h5><h5 class="mb-0"><i class="fas fa-user"></i> '+value.session_year+', Batch: '+value.session_batch+', Stream: '+value.session_stream+' </h5></div></div></div></div><div class="patient-info"><ul><li>Phone: <span>'+value.phone_number+'</span></li><li>Account Status: <span>'+value.session_status+'</span></li><li>Action: <span>'+tool+'</span></li></ul></div></div></div></div>';

    $('#session_list').append(session_list);



      });

 }
      
        }
})

 }




$("#session_id").keyup(function(){
    var session_id = $(this).val();
   
   LoadSession(session_id);

 });



$("#session_id").bind("change keyup", function(event){
    var session_id = $(this).val();
   
   LoadSession(session_id);

 });





$('body').delegate('#activate_session_btn', 'click', function(e){

    e.preventDefault();
   
    var session_id = $(this).data('id');

    if (confirm("Are you sure? Clicking Ok means a thousand naira has been paid to you for account activation.")) {



$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.activatesession')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	 LoadSession();
    $('.overlay').hide();
			
		}


	})


    }


    

});










$('body').delegate('#deactivate_session_btn', 'click', function(e){

    e.preventDefault();
   
    var session_id = $(this).data('id');

    if (confirm("Are you sure? ")) {



$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deactivatesession')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	 LoadSession();
    $('.overlay').hide();
			
		}


	})


    }


    

});




























				});
			</script>






@include('ObsInc.changepassword')
@endsection			