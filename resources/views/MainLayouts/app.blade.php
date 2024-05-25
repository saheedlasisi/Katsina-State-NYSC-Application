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
<!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
           <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
          <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
          <link rel="stylesheet" href="{{ asset('css/overlay.css') }}">
	
	</head>
	<body>
<!-- Main Wrapper -->
		<div class="main-wrapper">
      <div class="overlay"><div class="loader"></div></div>
@include('MainInc.header')

	 @yield('content')

@include('MainInc.footer')

			   </div>
	   <!-- /Main Wrapper -->
	  
		  <!-- jQuery -->
             <script src="{{ asset('js/jquery.js') }}"></script>
             <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

            <!-- Sticky Sidebar JS -->
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
        
        <!-- Slick JS -->
        <script src="{{ asset('assets/js/slick.js') }}"></script>
      <!-- Fancybox JS -->
    <script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
        <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        
        <!-- Custom JS -->
        <script src="{{ asset('assets/js/script.js') }}"></script>  

        <script src="{{ asset('assets/js/moment.js') }}"></script>
        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
         <script src="{{ asset('DataTables/datatables.js') }}" defer ></script>
          <script type="text/javascript" src="{{ asset('js/croppie.js') }}"></script>
          <script type="text/javascript" src="{{ asset('css/timeago.js') }}"></script>

		<script type="text/javascript">
			
$(document).ready(function(){

var _tokens = $('input[name=_token]').val();

//Track Ticket
$('#trackticket_form').on('submit', function(e){

  e.preventDefault();
  data = $(this).serialize();
  url = $(this).attr('action');
  var tracked_id = $('#track_ticket_id').val();
 if (tracked_id == '') {

    alert('You need to fill in the field before processing, Thanks.');


 } else {

  if (confirm('Are you sure of this?')) {


  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: url,
    data: data,
    success: function(data){

     // console.log(data);
		
	if (data == 'success') {

		window.location.href = '/showticket'+'/'+tracked_id;


	}else{

		alert(data);
	}	     
 


    }


  })  

  }

 }


});




$('#guest_comment_form').on('submit', function(e){

  e.preventDefault();
  data = $(this).serialize();
  url = $(this).attr('action');
  var guest_blog_id = $('#guest_blog_id').val();
  var guest_comment_name = $('#guest_comment_name').val();
  var guest_comment_email = $('#guest_comment_email').val();
  var guest_comment = $('#guest_comment').val();
  
  	if (guest_comment_name == '') {

  		alert('Please enter your name');
  	}else if (guest_comment_email == '') {

  		alert('Please your email address is required');

  	}else if (guest_comment == '') {

  		alert('Please leave a comment.');
  	}else {


  		if (confirm('Are you sure?')) {


  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: url,
    data: data,
    success: function(data){

     //console.log(data);
     alert(data);
     $('#guest_comment').val('');
     GetComment();
			 CountComment();     
    }


  })  

  }

  	}
  



});



//setInterval(function(){ GetComment() }, 1000);
	GetComment();

	function GetComment(){

	var get_blog_id	= $('#get_blog_id').val();
	

	$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('getcomment')}}",
    data: {get_blog_id:get_blog_id,_tokens:_tokens},
    success: function(data){

      //console.log(data);

      if (data == '') {


	var comments = '<center><h1>No comment</h1></center>';
	$('.comments-list').html(comments);


      }else{

	$('.comments-list').empty();
     $.each(data, function(i, value){


  

	var comments = '<li><div class="comment"><div class="comment-author"><img class="avatar" alt="" src="/assets/img/corperimage/'+value.c_image+'"></div><div class="comment-block"><span class="comment-by"><span class="blog-author-name">'+value.c_name+'</span></span><p>'+value.c_comment+'</p><p class="blog-date">'+moment(value.created_at).format('DD-MM-YYYY')+'</p></div></div></li>';
		$('.comments-list').append(comments);


     });

      }

      

    }


  });


	}





//setInterval(function(){ CountComment() }, 1000);
	CountComment();

	function CountComment(){

	var count_blog_id = $('#get_blog_id').val();
	

	$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('countcomment')}}",
    data: {count_blog_id:count_blog_id,_tokens:_tokens},
    success: function(data){

      //console.log(data);
      

      if (data == 0) {
      	$('#total_comment').html(data+' comment');
      	$('#t_comment').html(data+' comment');
      }else if(data == 1){
      	$('#total_comment').html(data+' comment');
      	$('#t_comment').html(data+' comment');
      }else{

      	$('#total_comment').html(data+' comments');
      	$('#t_comment').html(data+' comments');

      }
 

    }


  });


	}




	          $('#user_comment_form').on('submit', function(e){

  e.preventDefault();
  data = $(this).serialize();
  url = $(this).attr('action');

  var user_comment = $('#user_comment').val();
  
    if (user_comment == '') {

        alert('Please leave a comment.');
    }else {


        if (confirm('Are you sure?')) {


  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: url,
    data: data,
    success: function(data){

     //console.log(data);
     alert(data);
     $('#user_comment').val('');
       GetComment();
       CountComment(); 
                 
    }


  })  

  }

    }
  



});



$('#contact_me_btn').click(function(){
$('#contactmeModal').show();
});

$('#contactmeup').click(function(){
$('#contactmeModal').hide();
});


$('#contactmedown').click(function(){
$('#contactmeModal').hide();
}); 


$('#contactme_form').on('submit', function(e){

  e.preventDefault();
  data = $(this).serialize();
  url = $(this).attr('action');



        if (confirm('Are you sure?')) {
$('.overlay').show();
$('#contactmeModal').hide();
  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: url,
    data: data,
    success: function(data){

     console.log(data);
     $('.overlay').hide();
     $('#contactmeModal').show();
     //alert(data);
     $('#contactme_form').trigger('reset');

        
                 
    }


  })  

 

    }
  



});





 $('#user_comment_form').on('submit', function(e){

  e.preventDefault();
  data = $(this).serialize();
  url = $(this).attr('action');

  var user_comment = $('#user_comment').val();
  
    if (user_comment == '') {

        alert('Please leave a comment.');
    }else {


        if (confirm('Are you sure?')) {


  
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: url,
    data: data,
    success: function(data){

     //console.log(data);
     alert(data);
     $('#user_comment').val('');
       GetComment();
       CountComment(); 
                 
    }


  })  

  }

    }
  



});






 $("#search_blog").keyup(function(){

var search_blog = $(this).val();

 $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('main.searchblog')}}",
    method:"POST",
    data:{search_blog:search_blog,_tokens:_tokens},
    success:function(data){

    //console.log(data);




$('#blog_search_output').empty();
        if (data == '') {
$('#blog_search_output').empty();
          var blog_search_output = '';

    $('#blog_search_output').append(blog_search_output);

        }else{

             $('#blog_search_output').empty();
     $.each(data, function(i, value){


var blog_search_output = '<li><div class="post-thumb"><a href="/blog/'+value.b_title+'"><img class="img-fluid" src="/assets/img/blog/'+value.b_image+'" alt=""> </a></div><div class="post-info"><h4><a href="/blog/'+value.b_title+'">'+value.b_title+'</a></h4></div></li>';

    $('#blog_search_output').append(blog_search_output);



      });


        }






    }

})

 });



$("#search_blog").bind("change keyup", function(event){

var search_blog = $(this).val();

 $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('main.searchblog')}}",
    method:"POST",
    data:{search_blog:search_blog,_tokens:_tokens},
    success:function(data){

    //console.log(data);




$('#blog_search_output').empty();
        if (data == '') {
$('#blog_search_output').empty();
          var blog_search_output = '';

    $('#blog_search_output').append(blog_search_output);

        }else{

             $('#blog_search_output').empty();
     $.each(data, function(i, value){


var blog_search_output = '<li><div class="post-thumb"><a href="/blog/'+value.b_title+'"><img class="img-fluid" src="/assets/img/blog/'+value.b_image+'" alt=""> </a></div><div class="post-info"><h4><a href="/blog/'+value.b_title+'">'+value.b_title+'</a></h4></div></li>';

    $('#blog_search_output').append(blog_search_output);



      });


        }






    }

})

 });




















$("#search_cds").keyup(function(){

var search_cds = $(this).val();

 $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('main.searchcds')}}",
    method:"POST",
    data:{search_cds:search_cds,_tokens:_tokens},
    success:function(data){

    //console.log(data);




$('#cds_search_output').empty();
        if (data == '') {
$('#cds_search_output').empty();
          var cds_search_output = '';

    $('#cds_search_output').append(cds_search_output);

        }else{

             $('#cds_search_output').empty();
     $.each(data, function(i, value){


var cds_search_output = '<li><div class="post-thumb"><a href="/cds/'+value.project_topic+'/'+value.cds_project_id+'"><img class="img-fluid" src="/assets/img/cdsimage/'+value.project_image+'" alt=""> </a></div><div class="post-info"><h4><a href="/cds/'+value.b_title+'/'+value.cds_project_id+'">'+value.project_topic+'</a></h4></div></li>';

    $('#cds_search_output').append(cds_search_output);



      });


        }






    }

})

 });



$("#search_cds").bind("change keyup", function(event){

var search_cds = $(this).val();

 $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('main.searchcds')}}",
    method:"POST",
    data:{search_cds:search_cds,_tokens:_tokens},
    success:function(data){

    //console.log(data);




$('#cds_search_output').empty();
        if (data == '') {
$('#cds_search_output').empty();
          var cds_search_output = '';

    $('#cds_search_output').append(cds_search_output);

        }else{

             $('#cds_search_output').empty();
     $.each(data, function(i, value){


var cds_search_output = '<li><div class="post-thumb"><a href="/cds/'+value.project_topic+'/'+value.cds_project_id+'"><img class="img-fluid" src="/assets/img/cdsimage/'+value.project_image+'" alt=""> </a></div><div class="post-info"><h4><a href="/cds/'+value.b_title+'/'+value.cds_project_id+'">'+value.project_topic+'</a></h4></div></li>';

    $('#cds_search_output').append(cds_search_output);



      });


        }






    }

})

 });































});


</script>
		
	</body>


</html>