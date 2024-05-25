@section('content')
@extends('layouts.app')


<input type="hidden" name="" id="my_id" value="{{auth()->user()->id}}">
<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12">
							<div class="chat-window">
							
								<!-- Chat Left -->
								<div class="chat-cont-left">
									<div class="chat-header" style="background: lightgreen;">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
											<i class="material-icons">control_point</i>
										</a>
									</div>
									<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fas fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search" id="chats_search">
										</div>
									</form>
									<div class="chat-users-list">
										<div class="chat-scroll" id="chatusers_list">

											
											
										
										</div>
									</div>
								</div>
								<!-- /Chat Left -->
							
								<!-- Chat Right -->
								<div class="chat-cont-right">
									<div class="chat-header" style="background: lightgreen;">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
											<div class="media" >
											<div class="media-img-wrap" id="user_info_image">
												
											</div>
											<div class="media-body">
												<div class="user-name" id="user_info_name"> </div>
												<div class="user-status" id="user_info_status"> </div>
											</div>
										</div>
										
										<div class="chat-options" id="chat_option">
											
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll">
											<ul class="list-unstyled" id="our_chats">
												
											</ul>
										</div>
									</div>
								     <div class="chat-footer" id="chat_footer">
                    <div class="input-group">
                    
                   <textarea rows="1" class="input-msg-send form-control" placeholder="Send Message" id="chattheuser_msg"></textarea>
                     <div class="input-group-append">
                        <button type="button" class="btn msg-send-btn" id="chattheuser_msg_button"><i class="fab fa-telegram-plane"></i></button>
                      </div>
                    </div>
                  </div>
								</div>
								<!-- /Chat Right -->
								
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>


			</div>		
			<!-- /Page Content -->

 <script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
var _tokens = $('input[name=_token]').val();

function function2(){
//	console.log({} + [] + " = {} + []");
}





	$('#chat_footer').hide();


var my_id = $('#my_id').val();
fetchChatUsers();
 function fetchChatUsers(users=""){
	function2();
 	      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.chatusers')}}",
    method:"POST",
    data:{users:users,_tokens:_tokens},
    success:function(data){

 // console.log(data)
 $('#chatusers_list').empty();
      if (data.users == '') {
var chatusers_list = '<center><h6>NO RECORD FOUND</h6></center>';

$('#chatusers_list').append(chatusers_list);
      }else{

$('#chatusers_list').empty();
var get_status = 0;
     $.each(data.users, function(i, value){

      	  	
     	      	  	if (value.sender_id == my_id) {

     	      	 if (value.receiver_online_status >= data.current_time) {
     	      	 	var time = 'avatar-online';
     	      	 }else{
     	      	 	var time = 'avatar-offline';
     	      	 } 		

var chatusers_list = '<a href="javascript:void(0);" data-current="'+data.current_time+'" data-status="'+value.receiver_online_status+'" data-image="'+value.receiver_image+'" data-id="'+value.receiver_id+'" data-name="'+value.receiver_name+'" id="reply_chatback" class="media"><div class="media-img-wrap"><div class="avatar '+time+'"><img src="/assets/img/corperimage/'+value.receiver_image+'" alt="User Image" class="avatar-img rounded-circle"></div></div><div class="media-body"><div><div class="user-name">'+value.receiver_name+'</div><div class="user-last-chat">'+value.message+'</div></div><div><div class="last-chat-time block">'+value.time_sent+'</div><div class="badge badge-success badge-pill"></div></div></div></a>';

$('#chatusers_list').append(chatusers_list);

      	  	}else if(value.receiver_id == my_id){

 if (value.sender_online_status >= data.current_time) {
     	      	 	var time = 'avatar-online';
     	      	 }else{
     	      	 	var time = 'avatar-offline';
     	      	 }

     	      	 if (value.receiver_status > 0) {
     	      	 	var receiver_status = value.receiver_status;
     	      	 }else{

     	      	 		var receiver_status = '';
     	      	 }

           var getted_status = get_status+=value.receiver_status;
           
           if (getted_status > 0) {
            var got_status = getted_status;
           }else{
 var got_status = '';

           }    
      	  		
var chatusers_list = '<a href="javascript:void(0);" data-id="'+value.sender_id+'" data-current="'+data.current_time+'" data-image="'+value.sender_image+'" data-name="'+value.sender_name+'" data-status="'+value.sender_online_status+'" id="reply_chatback" class="media"><div class="media-img-wrap"><div class="avatar '+time+'"><img src="assets/img/corperimage/'+value.sender_image+'" alt="User Image" class="avatar-img rounded-circle"></div></div><div class="media-body"><div><div class="user-name">'+value.sender_name+'</div><div class="user-last-chat"></div></div><div><div class="last-chat-time block">'+value.time_sent+'</div><div class="badge badge-success badge-pill">'+got_status+'</div></div></div></a>';
$('#chatusers_list').append(chatusers_list);

      	  	}else{
      	  		


      	  	}



      	  });

      }
      
    }


  })

 	      setTimeout(function(){
		fetchChatUsers();
	}, 1000);

 }



 $("#chats_search").keyup(function(){
    var chats_search = $(this).val();
   
   fetchChatUsers(chats_search);

 });



$("#chats_search").bind("change keyup", function(event){
    var chats_search = $(this).val();
   
   fetchChatUsers(chats_search);

 });








$('body').delegate('#reply_chatback', 'click', function(e){

	$('#chat_footer').show();
    e.preventDefault();
    var u_id = $(this).data('id');
    var u_image = $(this).data('image');
    var u_name = $(this).data('name');
    var u_status = $(this).data('status');
    var u_current = $(this).data('current');
//alert(u_id);
    if (u_status >= u_current) {
     	      	 	var time = 'avatar-online';
     	      	 	var status = 'online';
     	      	 }else{
     	      	 	var status = 'offline';
     	      	 	var time = 'avatar-offline';
     	      	 } 




    var user_info_image = '<div class="avatar"><img src="/assets/img/corperimage/'+u_image+'" alt="User Image" class="avatar-img rounded-circle"></div>';
    $('#user_info_image').html(user_info_image);
    $('#user_info_name').html(u_name);
    //$('#user_info_status').html(status);
    
    var chat_option = '<a href="javascript:void(0)" data-toggle="modal" data-target="#voice_call"><i class="material-icons">local_phone</i></a><a href="javascript:void(0)" data-toggle="modal" data-target="#video_call"><i class="material-icons">videocam</i></a><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a>';
$('#chat_option').html(chat_option);






// function function3(){
// 	console.log({} + [] + " = {} + []");
// }


    //setInterval(function(){ fetchOurChat() }, 1000);

fetchOurChat();

  function fetchOurChat(){

  	//function3();
 
 $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.getourchat')}}",
    method:"POST",
    data:{u_id:u_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
$('#our_chats').empty();
    if (data == '') {

    }else{

$('#our_chats').empty();
     $.each(data, function(i, value){


  if (value.sender_id == my_id) {


         var our_chats = '<li class="media sent" id="delete_my_message" data-id="'+value.chat_id+'"><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li> </ul></div></div></div></li>';

    $('#our_chats').append(our_chats);


      }else{
        

 var our_chats = '<li class="media received"><div class="avatar"><img src="/assets/img/corperimage/'+u_image+'" alt="User Image" class="avatar-img rounded-circle"></div><div class="media-body"><div class="msg-box"><div><p>'+value.message+'</p><ul class="chat-msg-info"><li><div class="chat-time"><span>'+value.time_sent+'</span></div></li>';

    $('#our_chats').append(our_chats);

      }



      });

    }
 
       
     }


  })

 // $fetctchat = setTimeout(function(){
	// 	fetchOurChat();
	// }, 5000);



  }

  //clearTimeout($fetctchat);

       UpdateStatus();
      function UpdateStatus(){
      	
    $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.getchatuserinfo')}}",
    method:"POST",
    data:{u_id:u_id,_tokens:_tokens},
    success:function(data){

    console.log(data)

    }


  })

}


  





$('body').delegate('#chattheuser_msg_button', 'click', function(e){

	e.preventDefault();
	var messages = $('#chattheuser_msg').val();

	if ( messages == '') {

	}else{


	$.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.submitourchat')}}",
    method:"POST",
    data:{u_id:u_id, messages:messages,_tokens:_tokens},
    success:function(data){

    //console.log(data)
    $('#chattheuser_msg').val('');
    fetchOurChat();

    }


  })


	}



});



$('body').delegate('#delete_my_message', 'dblclick', function(e){

  e.preventDefault();
  var chat_id = $(this).data('id');

  if ( confirm("Do you wants to delete this message?")) {

      $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('user.deletemychat')}}",
    method:"POST",
    data:{chat_id:chat_id,_tokens:_tokens},
    success:function(data){

    //console.log(data)
        fetchOurChat();


    }


  })

  }

});







});



$('#back_user_list').click(function(){
fetchChatUsers();

});
















			


	});
</script>


@include('inc.changepassword')
@endsection