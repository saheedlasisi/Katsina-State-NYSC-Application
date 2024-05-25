<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
	

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | {{$title}}</title>

		  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
		
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon.png') }}">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/font-awesome.min.css') }}">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/feathericon.min.css') }}">
		
		<link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css') }}">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
		
		<style type="text/css">
			#button_filter{

      display: flex;
      flex-flow: wrap;
      flex-direction: row;


    }


#button_filter{

      display: flex;
      flex-flow: wrap;
      flex-direction: row;

    }

           .modal-body{
    height: 300px;
    overflow-y: auto;
}

@media (min-height: 500px) {
    .modal-body { height: 400px; }
}

@media (min-height: 800px) {
    .modal-body { height: 600px; }
}




		</style>

	</head>
	<body>
<!-- Main Wrapper -->
		<div class="main-wrapper">

@include('AdminInc.header')
@include('AdminInc.sider')


	 @yield('content')

@include('AdminInc.footer')

			   </div>
	   <!-- /Main Wrapper -->
	  
		
<!-- jQuery -->
        <script src="{{ asset('admin/assets/js/jquery-3.2.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/obs.js') }}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
        <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
		
		<script src="{{ asset('admin/assets/plugins/raphael/raphael.min.js') }}"></script>    
		<script src="{{ asset('admin/assets/plugins/morris/morris.min.js') }}"></script>  
		<script src="{{ asset('admin/assets/js/chart.morris.js') }}"></script>
		
		<!-- Custom JS -->
		<script  src="{{ asset('admin/assets/js/script.js') }}"></script>
		
	
		<script type="text/javascript">
			
			$(document).ready(function(){










// $('#reg_staff_btn').click(function(e){

//    e.preventDefault();

// var staff_name = $('#staff_name').val();
// var staff_phone_number = $('#staff_phone_number').val();
// var staff_email = $('#staff_email').val();
// var staff_position = $('#staff_position').val();
// var staff_password = $('#staff_password').val();
// var staff_password_again = $('#staff_password_again').val();


// if (staff_name == '') {

// 	alert("name is required");

// }else if(staff_email == ''){

// alert("Email is required");

// }else if(validateEmail(staff_email) == false){
        
//         alert("you have input worng email address");
        
// }else if(staff_phone_number == ''){

// alert("Email is required");

// }else if(staff_password == ''){

// alert("Password is required");

// }else if(staff_password_again == ''){

// alert("Password Again is required");

// }else if(staff_password != staff_password_again){

// alert("Password not match");

// }else{

// if (confirm("Are you sure?")) {

// 		$('#wait_obs').show();
// 		  $.ajax({
//      headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//     type: 'POST',
//     url: "{{route('admin.storeobs')}}",
//     data: {staff_email:staff_email,staff_name:staff_name,staff_password:staff_password,,staff_position:staff_position,,staff_phone_number:staff_phone_number},
//     success: function(data){

   
//     //console.log(data);
//     alert(data);
//    	$('#wait_obs').hide();
// $('#obs_name').val();
//  $('#obs_email').val();
//    	// ObsTable();

//     }


//   })


// 	}
// }

// });



$('#wait_obs').hide();
$('#register_obs').click(function(){
	$('#obsModal').show();
		

	// FetchCorps();
});


$('#obsup').click(function(){
	$('#obsModal').hide();
});

$('#obsdown').click(function(){
	$('#obsModal').hide();
});






$('#reg_staff_btn').click(function(event){

event.preventDefault();

var staff_name = $('#staff_name').val();
var staff_phone_number = $('#staff_phone_number').val();
var staff_email = $('#staff_email').val();
var staff_position = $('#staff_position').val();
var staff_password = $('#staff_password').val();
var staff_password_again = $('#staff_password_again').val();

if (staff_name == '') {

	alert('Name is required');
}else if (staff_email == '') {

	alert('Email is required');

}else if (validateEmail(staff_email) == false) {

	alert("Please Enter Correct Email");
}else if (staff_password == '') {

	alert('Password is required');

}else if (staff_password_again == '') {

	alert('Password Again is required');

}else if (staff_password_again != staff_password) {

	alert('Password not match');

}else{

	if (confirm("Are you sure")) {


	}
}

	

});



function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }





				
			});
		</script>
		

	</body>


</html>