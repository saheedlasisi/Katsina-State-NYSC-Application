<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
	

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | {{$title}}</title>

		  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="chat-page">
<!-- Main Wrapper -->
		<div class="main-wrapper">
@include('MainInc.header')


	 @yield('content')




			   </div>
	   <!-- /Main Wrapper -->
	  
	<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Slick JS -->
		<script src="{{ asset('assets/js/slick.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js') }}"></script>


		<script type="text/javascript">
			
$(document).ready(function(){

var _tokens = $('input[name=_token]').val();
//Get Ticket Chats
//var get_ticket_ids = $('#msg_ticket_id').val();
//GetTicketChat(get_ticket_ids);



$('body').delegate('#open_chat', 'click', function(e){

    e.preventDefault();
    var get_ticket_ids = $(this).data('id');

GetTicketChat(get_ticket_ids);
    function GetTicketChat(get_ticket_id=''){




  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: '/getchats',
    data: {get_ticket_id:get_ticket_id,_tokens:_tokens},
    success: function(data){

     //console.log(data);

     $('#user_msgs').empty();
     $.each(data, function(i, value){
     	// var date = new Date(value.created_at);
     	// var time = Math.floor(date.getTime()/1000);
     	//date.setTime(time)
     	 if(value.sender_type == 'user'){
     		
    var user_messages = '<li class="media sent"><div class="media-body"><div class="msg-box"><div><p id="user_messge">'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span id="user_time">'+value.msg_time+'</span></div></li></ul></div></div></div></li>';

    	
    	$('#user_msgs').append(user_messages);


     	}else{


 	if (value.user_notify == 1) {
 		var staff_image = $('#staff_profile_image').val();
 		 var staff_messages = '<li class="media received" id="staff_msgs" ><div class="avatar"><img src="/assets/img/staffimage/'+staff_image+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span style="color: green">'+value.msg_time+' <div class="badge badge-success badge-pill">new</div></span></div></li></ul></div></div></div></li>';
  $('#user_msgs').append(staff_messages);
 	}else{

 		var staff_image = $('#staff_profile_image').val();
 		 var staff_messages = '<li class="media received" id="staff_msgs"><div class="avatar"><img src="/assets/img/staffimage/'+staff_image+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.msg_time+'</span></div></li></ul></div></div></div></li>';
  $('#user_msgs').append(staff_messages);
 	}



     	}


     });
		
	     
 
	}


  }); 


}




$('#msg_button').click(function(){

var msg_ticket_id = $('#msg_ticket_id').val();
var user_email = $('#user_email').val();
var user_name = $('#user_name').val();
var row_id = $('#row_id').val();
var user_subject = $('#user_subject').val();
var msg = $('#msg').val();

if (msg == '') {

 	alert('You cannot send an empty field..............');

}else{


	if (confirm('Are you sure of this message or you gonna take a look again')) {





    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: '/sendhelp',
    data: {msg_ticket_id:msg_ticket_id,user_email:user_email,user_name:user_name,row_id:row_id,user_subject:user_subject,msg:msg,_tokens:_tokens},
    success: function(data){

     //console.log(data);

	$('#msg').val('');	
	alert(data);
	GetTicketChat(get_ticket_ids);
	     
 
	}


  });






	}


 }



});







  


});








//setInterval(function(){GetTicketChat(get_ticket_ids)}, 1000);





//Send Help







//Closing a ticket By User

$('#close_btn').click(function(){

var close_row_id = $('#row_id').val();
var close_ticket_id = $('#msg_ticket_id').val();

if (confirm('Are you sure you wants to close this ticket, you wont be able to send or receive help with the ticket after been closed.')) {

	$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: '/closeticket',
    data: {close_row_id:close_row_id,_tokens:_tokens},
    success: function(data){

     //console.log(data);
     $('.hide_close').hide();		
	alert(data);
	window.location.href = '/showticket'+'/'+close_ticket_id;
	     
 
	}


  });



}



});





});




		</script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jul 2020 15:00:21 GMT -->
</html>