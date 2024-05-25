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
@include('StaffInc.header')

	 @yield('content')



			   </div>
	   <!-- /Main Wrapper -->
	  
		
	<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Circle Progress JS -->
		<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('assets/js/script.js') }}"></script>

		<script type="text/javascript">
			
	$(document).ready(function(){

$('.msg-typing').hide();


$('body').delegate('#open_chat', 'click', function(e){

    e.preventDefault();
    var get_ticket_ids = $(this).data('id');
		//Get Ticket Chats
// var get_ticket_ids = $('#msg_ticket_id').val();
GetTicketChat(get_ticket_ids);
setInterval(function(){GetTicketChat(get_ticket_ids)}, 1000);

function GetTicketChat(get_ticket_id=''){




  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('staff.loadhelpdeskchat')}}",
    data: {get_ticket_id:get_ticket_id},
    success: function(data){

     //console.log(data);

     $('#user_msgs').empty();
     $.each(data, function(i, value){
     	// var date = new Date(value.created_at);
     	// var time = Math.floor(date.getTime()/1000);
     	//date.setTime(time)
     	 if(value.sender_type == 'staff'){
     		
    var user_messages = '<li class="media sent"><div class="media-body"><div class="msg-box"><div><p id="user_messge">'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span id="user_time">'+value.msg_time+'</span></div></li></ul></div></div></div></li>';

    	
    	$('#user_msgs').append(user_messages);


     	}else{


  
     if (value.staff_notify == 1) {

     	var staff_messages = '<li class="media received" id="staff_msgs"><div class="avatar"><img src="{{ asset('assets/img/helpdesk/helpdesk2.png')}}" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span style="color: green">'+value.msg_time+' <div class="badge badge-success badge-pill">new</div></span></div></li></ul></div></div></div></li>';
  $('#user_msgs').append(staff_messages);
     }else{
var staff_messages = '<li class="media received" id="staff_msgs"><div class="avatar"><img src="{{ asset('assets/img/helpdesk/helpdesk2.png')}}" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.msg_time+'</span></div></li></ul></div></div></div></li>';
  $('#user_msgs').append(staff_messages);


     }



     	}


     });
		
	     
 
	}


  }); 


}


});



//Send Help


$('#msg_button').click(function(){

var msg_ticket_id = $('#msg_ticket_id').val();
var row_id = $('#row_id').val();
var msg = $('#msg').val();

if (msg == '') {

 	alert('You cannot send an empty field..............');

}else{


	if (confirm('Are you sure of this message or you gonna take a look again')) {
$('.msg-typing').show();

	$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('staff.replyticket')}}",
    data: {msg_ticket_id:msg_ticket_id,row_id:row_id,msg:msg},
    success: function(data){

     //console.log(data);

	$('#msg').val('');	
	alert(data);
	GetTicketChat(get_ticket_ids);
	$('.msg-typing').hide();
	     
 
	}


  });






	}


 }



});









	});


		</script>

		
		
	</body>


</html>