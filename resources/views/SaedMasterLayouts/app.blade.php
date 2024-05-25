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
	 <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
	   <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
	    <link rel="stylesheet" href="{{ asset('css/overlay.css') }}">
		
		<style type="text/css">
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



.chat-now {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
}
.chat-now .chat-header {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
    background-color: #fff;
    border-bottom: 1px solid #f0f0f0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    height: 72px;
  justify-content: space-between;
  -webkit-justify-content: space-between;
  -ms-flex-pack: space-between;
    padding: 0 15px;
}
.chat-now .chat-header .back-user-list {
    display: none;
    margin-right: 5px;
    margin-left: -7px;
}
.chat-now .chat-header .media {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.chat-now .chat-header .media .media-img-wrap {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-right: 15px;
}
.chat-now .chat-header .media .media-img-wrap .avatar {
  height: 50px;
  width: 50px;
}
.chat-now .chat-header .media .media-img-wrap .status {
    border: 2px solid #fff;
    bottom: 0;
    height: 10px;
    position: absolute;
    right: 3px;
    width: 10px;
}
.chat-now .chat-header .media .media-body .user-name {
    color: #272b41;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
}
.chat-now .chat-header .media .media-body .user-status {
    color: #666;
    font-size: 14px;
}
.chat-now .chat-header .chat-options {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}
.chat-now .chat-header .chat-options > a {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
    border-radius: 50%;
    color: #8a8a8a;
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
    height: 30px;
  justify-content: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
    margin-left: 10px;
    width: 30px;
}
.chat-now .chat-body {
    background-color: #f5f5f6;
}
.chat-now .chat-body ul.list-unstyled {
    margin: 0 auto;
    padding: 15px;
    width: 100%;
}
.chat-now .chat-body .media .avatar {
    height: 30px;
    width: 30px;
}
.chat-now .chat-body .media .media-body {
  margin-left: 20px;
}
.chat-now .chat-body .media .media-body .msg-box > div {
  padding: 10px 15px;
  border-radius: .25rem;
  display: inline-block;
  position: relative;
}
.chat-now .chat-body .media .media-body .msg-box > div p {
    color: #272b41;
    margin-bottom: 0;
}
.chat-now .chat-body .media .media-body .msg-box + .msg-box {
  margin-top: 5px;
}
.chat-now .chat-body .media.received {
  margin-bottom: 20px;
}
.chat-now .chat-body .media:last-child {
  margin-bottom: 0;
}
.chat-now .chat-body .media.received .media-body .msg-box > div {
  background-color: #fff;
}
.chat-now .chat-body .media.sent {
    margin-bottom: 20px;
}
.chat-now .chat-body .media.sent .media-body {
  -webkit-box-align: flex-end;
  -ms-flex-align: flex-end;
  align-items: flex-end;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  justify-content: flex-end;
  -webkit-justify-content: flex-end;
  -ms-flex-pack: flex-end;
    margin-left: 0;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div {
    background-color: #e3e3e3;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div p {
    color: #272b41;
}
.chat-now .chat-body .chat-date {
    font-size: 14px;
    margin: 1.875rem 0;
    overflow: hidden;
    position: relative;
    text-align: center;
    text-transform: capitalize;
}
.chat-now .chat-body .chat-date:before {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    margin-right: 28px;
    position: absolute;
    right: 50%;
    top: 50%;
    width: 100%;
}
.chat-now .chat-body .chat-date:after {
    background-color: #e0e3e4;
    content: "";
    height: 1px;
    left: 50%;
    margin-left: 28px;
    position: absolute;
    top: 50%;
    width: 100%;
}
.chat-now .chat-footer {
    background-color: #fff;
    border-top: 1px solid #f0f0f0;
    padding: 10px 15px;
    position: relative;
}
.chat-now .chat-footer .input-group {
    width: 100%;
}
.chat-now .chat-footer .input-group .form-control {
    background-color: #f5f5f6;
    border: none;
    border-radius: 50px;
}
.chat-now .chat-footer .input-group .form-control:focus {
    background-color: #f5f5f6;
    border: none;
    box-shadow: none;
}
.chat-now .chat-footer .input-group .input-group-prepend .btn, 
.chat-now .chat-footer .input-group .input-group-append .btn {
    background-color: transparent;
    border: none;
    color: #9f9f9f;
}
.chat-now .chat-footer .input-group .input-group-append .btn.msg-send-btn {
    background-color: #0de0fe;
    border-color: #0de0fe;
    border-radius: 50%;
    color: #fff;
    margin-left: 10px;
    min-width: 46px;
    font-size: 20px;
}
.msg-typing {
  width: auto;
  height: 24px;
  padding-top: 8px
}
.msg-typing span {
  height: 8px;
  width: 8px;
  float: left;
  margin: 0 1px;
  background-color: #a0a0a0;
  display: block;
  border-radius: 50%;
  opacity: .4
}
.msg-typing span:nth-of-type(1) {
  animation: 1s blink infinite .33333s
}
.msg-typing span:nth-of-type(2) {
  animation: 1s blink infinite .66666s
}
.msg-typing span:nth-of-type(3) {
  animation: 1s blink infinite .99999s
}
.chat-now .chat-body .media.received .media-body .msg-box {
  position: relative;
}
.chat-now .chat-body .media.received .media-body .msg-box:first-child:before {
    border-bottom: 6px solid transparent;
    border-right: 6px solid #fff;
    border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: -6px;
    position: absolute;
    right: auto;
    top: 8px;
    width: 0;
}
.chat-now .chat-body .media.sent .media-body .msg-box {
    padding-left: 50px;
    position: relative;
}
.chat-now .chat-body .media.sent .media-body .msg-box:first-child:before {
  border-bottom: 6px solid transparent;
  border-left: 6px solid #e3e3e3;
  border-top: 6px solid transparent;
    content: "";
    height: 0;
    left: auto;
    position: absolute;
    right: -6px;
    top: 8px;
    width: 0;
}
.chat-msg-info {
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
    clear: both;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
    padding: 0;
    margin: 5px 0 0;
}
.chat-msg-info li {
    font-size: 13px;
    padding-right: 16px;
    position: relative;
}
.chat-msg-info li:not(:last-child):after {
  position: absolute;
  right: 8px;
  top: 50%;
  content: '';
  height: 4px;
  width: 4px;
  background: #d2dde9;
  border-radius: 50%;
  transform: translate(50%, -50%)
}
.chat-now .chat-body .media.sent .media-body .msg-box .chat-msg-info li:not(:last-child)::after {
    right: auto;
    left: 8px;
    transform: translate(-50%, -50%);
    background: #aaa;
}
.chat-now .chat-body .media.received .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-time {
    color: rgba(50, 65, 72, 0.4);
}
.chat-msg-info li a {
  color: #777;
}
.chat-msg-info li a:hover {
  color: #2c80ff
}
.chat-seen i {
  color: #00d285;
  font-size: 16px;
}
.chat-msg-attachments {
  padding: 4px 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  margin: 0 -1px
}
.chat-msg-attachments > div {
  margin: 0 1px
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-info {
    flex-direction: row-reverse;
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-attachments {
  flex-direction: row-reverse
}
.chat-now .chat-body .media.sent .media-body .msg-box > div .chat-msg-info li {
    padding-left: 16px;
    padding-right: 0;
    position: relative;
}

		</style>	
	</head>
	<body>
<div class="overlay"><div class="loader"></div></div>		
<!-- Main Wrapper -->
		<div class="main-wrapper">
@include('SaedMasterInc.header')

	 @yield('content')

@include('SaedMasterInc.footer')

			   </div>
	   <!-- /Main Wrapper -->
	  
		<script src="{{ asset('js/jquery.js') }}"></script>
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
			<script src="{{ asset('assets/js/moment.js') }}"></script>
		<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
		 <script src="{{ asset('DataTables/datatables.js') }}" defer ></script>
		  <script type="text/javascript" src="{{ asset('js/croppie.js') }}"></script>
		  <script type="text/javascript" src="{{ asset('css/timeago.js') }}"></script>

<script>
		CKEDITOR.replace( 'saed_lecture_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>
<script>
		CKEDITOR.replace( 'edit_saed_lecture_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>
<script>
		CKEDITOR.replace( 'edit_saed_about',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>


<script type="text/javascript">
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();


$('#update_profile_btn').click(function(event){

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

event.preventDefault();
	var edit_saed_email = $('#edit_saed_email').val();
	var edit_saed_name = $('#edit_saed_name').val();
	var edit_saed_title = $('#edit_saed_title').val();
	var edit_saed_phone_number = $('#edit_saed_phone_number').val();
	var edit_saed_about = $('#edit_saed_about').val();
	var edit_saed_address = $('#edit_saed_address').val();
	
	if (edit_saed_name == '') {
alert("Name Field is Empty");
	}else if (edit_saed_email == '') {
alert("Email Field is Empty");
	}else if (edit_saed_title == '') {
		alert("Title Field is Empty");
	}else if (edit_saed_phone_number == '') {
		alert("Number Field is Empty");
	}else if (edit_saed_about == '') {
		alert("About  Field is Empty");
	}else if (edit_saed_address == '') {
		alert("Address Field is Empty");
	}else{


if (confirm("Are you sure?")) {


	$('.overlay').show();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.updateprofile')}}",
		method:"POST",
		data:{edit_saed_email:edit_saed_email,edit_saed_name:edit_saed_name,edit_saed_title:edit_saed_title,edit_saed_phone_number:edit_saed_phone_number,edit_saed_about:edit_saed_about,edit_saed_address:edit_saed_address ,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	     window.location.reload();
    $('.overlay').hide();

		}


	})


		}
	}



});




$('#change_image').click(function(){
$('#change_imageModal').show();
});

$('#change_imageup').click(function(){
$('#change_imageModal').hide();
});


$('#change_imagedown').click(function(){
$('#change_imageModal').hide();
});



$edit_image_crop = $('#edit_image-preview').croppie({

  enableExif:true,
  viewport:{
    width:350,
    height:250,
    type: 'square'

  },

  boundary:{

    width: 350,
    height: 250
  }


});



$('#edit_upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $edit_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#edit_upload_crop_image').click(function(event){

  event.preventDefault();

if ($('#edit_upload_image').val() == '') {
  alert("No picture selected Yet");

}else{

  if (confirm("Are you sure?")) {
      $edit_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){

$('.overlay').show();
    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("saedmaster.changeimage")}}',
      type: "POST",
      data: {"image":response, _token:_token},
      dataType: "json",
      success:function(data){

         //console.log(data);
        alert(data);
        window.location.reload();
$('.overlay').hide();
       
      }

    });

  });
  }
}

});




$('#change_password_btn').click(function(){
$('#changepasswordModal').show();
});

$('#changepasswordup').click(function(){
$('#changepasswordModal').hide();
});


$('#changepassworddown').click(function(){
$('#changepasswordModal').hide();
});




$('#update_password_btn').click(function(e){

e.preventDefault();

var edit_password = $('#edit_password').val();
var edit_password_again = $('#edit_password_again').val();

if (edit_password == '') {
	alert('Password field is empty');
}else if(edit_password_again == ''){
	alert('Password Again field is empy');
}else if(edit_password_again != edit_password){
	alert('Password Not Match');
}else {

	if (confirm("Are you sure?")) {
$('.overlay').show();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.updatepassword')}}",
		method:"POST",
		data:{edit_password:edit_password,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	     window.location.reload();
    $('.overlay').hide();

		}


	})
	}
}

});	





$('#uploadsession_btn').click(function(){
$('#uploadsessionModal').show();
});

$('#uploadsessionup').click(function(){
$('#uploadsessionModal').hide();
});


$('#uploadsessiondown').click(function(){
$('#uploadsessionModal').hide();
});


$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.getadminsession')}}",
		method:"POST",
		data:{_tokens:_tokens},
		success:function(data){

		//console.log(data)

		$('#session_batch').val(data.batch);
		$('#session_stream').val(data.stream);
		$('#session_year').val(data.year);
		
		}


	});



$('#session_upload_btn').click(function(event){

event.preventDefault();

var session_batch = $('#session_batch').val();
var session_stream = $('#session_stream').val();
var session_year = $('#session_year').val();

if (confirm("Are You Sure?")) {

	$('.overlay').show();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.sessionupload')}}",
		method:"POST",
		data:{session_batch:session_batch, session_stream:session_stream,session_year:session_year,_tokens:_tokens},
		success:function(data){

	//console.log(data);
	alert(data);
	     window.location.reload();
    $('.overlay').hide();

		}


	})

}


});







$('body').delegate('#delete_session_btn', 'click', function(e){

		e.preventDefault();
		var session_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('saedmaster.deletesession')}}",
		method:"POST",
		data:{session_id:session_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});








	});
</script>

	</body>


</html>
