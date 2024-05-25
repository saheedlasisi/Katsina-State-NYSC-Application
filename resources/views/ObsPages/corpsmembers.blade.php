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
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Corps Members</h2>
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
							<input type="text" name="user_name" id="user_name" placeholder="Search with either: Name, Phone Number , State Code, Email" class="form-control">
					<div class="row row-grid" id="corpsmembers_list">


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

LoadCorpsMembers();
   function LoadCorpsMembers(user_name=''){



    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('obs.fetchcorpsmembers')}}",
        method:"POST",
        data:{user_name:user_name,_tokens:_tokens},
        success:function(data){

        console.log(data)
//$('#total_corps').html(data.total);
$('#corpsmembers_list').empty();
        if (data.corps == '') {
$('#corpsmembers_list').empty();
          var corpsmembers_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#corpsmembers_list').append(corpsmembers_list);

        }else{

             $('#corpsmembers_list').empty();
     $.each(data.corps, function(i, value){


var corpsmembers_list = '<div class="col-md-6 col-lg-4 col-xl-3"><div class="card widget-profile pat-widget-profile"><div class="card-body"><div class="pro-widget-content"><div class="profile-info-widget"><a href="/assets/img/corperimage/'+value.profile_pic+'" class="booking-doc-img"><img src="/assets/img/corperimage/'+value.profile_pic+'" alt="User Image"></a><div class="profile-det-info"><h3>'+value.name+'</h3><div class="patient-details"><h5><b>State Code :</b> '+value.state_code+'</h5><h5 class="mb-0"><i class="fas fa-user"></i> '+value.year+', Batch: '+value.batch+', Stream: '+value.stream+' </h5></div></div></div></div><div class="patient-info"><ul><li>Phone: <span>'+value.phone_number+'</span></li><li>Account Status: <span>'+value.account_status+'</span></li><li>Action: <span><i class="fa fa-pen" style="color: lightgreen;" data-id="'+value.id+'" data-name="'+value.name+'" data-email="'+value.email+'" data-code="'+value.state_code+'" data-status="'+value.account_status+'" data-batch="'+value.batch+'" data-stream="'+value.stream+'" data-year="'+value.year+'"  id="edit_corpsmember_btn"></i></span></li></ul></div></div></div></div>';

    $('#corpsmembers_list').append(corpsmembers_list);



      });

 }
      
        }
})

 }




$("#user_name").keyup(function(){
    var user_name = $(this).val();
   
   LoadCorpsMembers(user_name);

 });



$("#user_name").bind("change keyup", function(event){
    var user_name = $(this).val();
   
   LoadCorpsMembers(user_name);

 });





$('body').delegate('#edit_corpsmember_btn', 'click', function(e){

    e.preventDefault();
    var name = $(this).data('name');
    var code = $(this).data('code');
    var status = $(this).data('status');
    var email = $(this).data('email');
    var year = $(this).data('year');
    var batch = $(this).data('batch');
    var stream = $(this).data('stream');
    var id = $(this).data('id');

    $('#corps_name').val(name);
    $('#corps_state_code').val(code);
    $('#corps_email').val(email);
    $('#corps_account_status').val(status);
    $('#corps_year').val(year);
    $('#corps_batch').val(batch);
    $('#corps_stream').val(stream);
    $('#corps_id').val(id);

    
    
$('#editcorpsmemberModal').show();

});

$('#editcorpsmemberup').click(function(){
$('#editcorpsmemberModal').hide();
});


$('#editcorpsmemberdown').click(function(){
$('#editcorpsmemberModal').hide();
});



$('#update_corpsmember_btn').click(function(event){

event.preventDefault();

	var corps_name = $('#corps_name').val();
    var corps_state_code = $('#corps_state_code').val();
    var corps_email = $('#corps_email').val();
    var corps_account_status = $('#corps_account_status').val();
    var corps_year = $('#corps_year').val();
    var corps_batch = $('#corps_batch').val();
    var corps_stream = $('#corps_stream').val();
    var corps_id = $('#corps_id').val();


    if (corps_name == '') {

   alert("Name Field is required");

    }else if (corps_state_code == '') {
	alert("State Code Field is required");
    }else if (corps_email == '') {
	alert("Email Field is required");
    }else if (corps_account_status == '') {
	alert("Account Status Field is required");
    }else{

if (confirm("Are you sure")) {

$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.updatecorpsmember')}}",
		method:"POST",
		data:{corps_name:corps_name,corps_state_code:corps_state_code,corps_email:corps_email,corps_account_status:corps_account_status,corps_year:corps_year,corps_batch:corps_batch,corps_stream:corps_stream,corps_id:corps_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	 LoadCorpsMembers();
    $('.overlay').hide();
			
		}


	})



}




}




});





















				});
			</script>





@include('ObsInc.editcorpsmember')
@include('ObsInc.changepassword')
@endsection			