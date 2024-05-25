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
		
		<style type="text/css">
			#button_filter{

      display: flex;
      flex-flow: wrap;
      flex-direction: row;


    }
		</style>	
	</head>
	<body>
		<div class="overlay"><div class="loader"></div></div>
<!-- Main Wrapper -->
		<div class="main-wrapper">
@include('StaffInc.header')

	 @yield('content')



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
         <!-- Circle Progress JS -->
		<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
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
//Entering a chat for helpdesk
		$('body').delegate('#start_btn', 'click', function(e){

		e.preventDefault();
		var start_ticket_id = $(this).data('id');
		var start_row_id = $(this).data('row');

		if (confirm('Are you sure you can handle this?')) {


		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('staff.starthelpdeskchat')}}",
		method:"POST",
		data:{start_ticket_id:start_ticket_id, start_row_id:start_row_id},
		success:function(data){

		//console.log(data)

		if (data == 'success') {

			window.location.href = 'showhelpdeskchat'+'/'+start_ticket_id;
		}else {


			alert(data);
		}

			
		}


	})

		}

		})



//Repling Ticket

$('body').delegate('#reply_btn', 'click', function(e){

var start_ticket_id = $(this).data('id');
		
window.location.href = 'showhelpdeskchat'+'/'+start_ticket_id;

});



//End


//Hostel Allocation

$('#allocate').click(function(){

$('#allocateModal').show();

FetchCorpersforHostel();

});

$('#allocateup').click(function(){

$('#allocateModal').hide();

});

$('#allocatedown').click(function(){

$('#allocateModal').hide();

});




function FetchCorpersforHostel(){

//fetching corpers for hostel allocation 

  $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('staff.fetchcorperforallocation')}}",
    success: function(data){

    var allocate_user_id_empty = '<option value="">Select</option>';
    
     
   
    $('#allocate_user_id').empty();
     $('#allocate_user_id').append(allocate_user_id_empty);
$.each(data, function(i, value){
var allocate_user_id_reg = '<option value="'+value.id+'">'+value.name+' '+value.phone_number+'</option>';
$('#allocate_user_id').append(allocate_user_id_reg);

});

    }


  })



}



//geting admin info


  $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('staff.getadmininfo')}}",
    success: function(data){

      //console.log(data);

      $('#allocate_batch').val(data.batch);
      $('#allocate_stream').val(data.stream);
      $('#allocate_year').val(data.year);


    } 

});



//Allocating to DB

$('body').delegate('#allocate_btn', 'click', function(e){
   e.preventDefault();
var allocate_batch = $('#allocate_batch').val();
 var allocate_stream = $('#allocate_stream').val();
 var allocate_year = $('#allocate_year').val();
var allocate_user_id = $('#allocate_user_id').val();
var allocate_block = $('#allocate_block').val();
var allocate_room = $('#allocate_room').val();


if (allocate_batch == '') {

alert('Batch field is empty');

}else if (allocate_stream == '') {

alert('Stream field is empty');

}else if (allocate_year == '') {

alert('Year field is empty');

}else if (allocate_user_id == '') {

alert('Corper selection field is empty');

}else if (allocate_block == '') {

alert('No block selected');

}else if (allocate_room == '') {

alert(' No Room selected ');

}else{


	if (confirm("Are you sure of this?")) {


		$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('staff.hostelallocationinsertion')}}",
    data: {allocate_batch:allocate_batch, allocate_stream:allocate_stream, allocate_year:allocate_year,allocate_user_id:allocate_user_id,allocate_block:allocate_block, allocate_room:allocate_room },
    success: function(data){

      //console.log(data);

      alert(data);

	FetchingMaleAllocation();
	FetchingFemaleAllocation();
    } 

})



	}



}



});



//male Filters

$('#male_close_btn').hide();
$('#male_block_filter_div').hide();
$('#male_block_and_room_filter_div').hide();
$('#male_manual_filter_div').hide();


$('#male_block_btn').click(function(){
	$('#male_block_filter_div').show();
	$('#male_close_btn').show();
	$('#male_block_and_room_filter_div').hide();
$('#male_manual_filter_div').hide();

$('#male_block_filter').val('');
$('#male_block_and_room_block').val('');
$('#male_block_and_room_room').val('');
$('#male_manual_block').val('');
$('#male_manual_room').val('');
 $('#male_manual_batch').val('');
 $('#male_manual_stream').val('');
$('#male_manual_year').val('');


FetchingMaleAllocation();

});


$('#male_block_and_room_btn').click(function(){

	$('#male_block_filter_div').hide();
	$('#male_close_btn').show();
	$('#male_block_and_room_filter_div').show();
$('#male_manual_filter_div').hide();


$('#male_block_filter').val('');
$('#male_block_and_room_block').val('');
$('#male_block_and_room_room').val('');
$('#male_manual_block').val('');
$('#male_manual_room').val('');
 $('#male_manual_batch').val('');
 $('#male_manual_stream').val('');
$('#male_manual_year').val('');


FetchingMaleAllocation();

});


$('#male_manual_btn').click(function(){

	$('#male_block_filter_div').hide();
	$('#male_close_btn').show();
	$('#male_block_and_room_filter_div').hide();
$('#male_manual_filter_div').show();

$('#male_block_filter').val('');
$('#male_block_and_room_block').val('');
$('#male_block_and_room_room').val('');
$('#male_manual_block').val('');
$('#male_manual_room').val('');
 $('#male_manual_batch').val('');
 $('#male_manual_stream').val('');
$('#male_manual_year').val('');


FetchingMaleAllocation();

});


//Fetching male allocation record
FetchingMaleAllocation();
function FetchingMaleAllocation(male_block_filter='', male_block_and_room_block='', male_block_and_room_room='', male_manual_block='', male_manual_room='', male_manual_batch='',male_manual_stream='', male_manual_year=''){




		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('staff.fetchmalecorperallocated')}}",
		method:"POST",
		data:{male_block_filter:male_block_filter,male_block_and_room_block:male_block_and_room_block,male_block_and_room_room:male_block_and_room_room,male_manual_block:male_manual_block,male_manual_room:male_manual_room,male_manual_batch:male_manual_batch,male_manual_stream:male_manual_stream,male_manual_year:male_manual_year},
		success:function(data){

		//console.log(data)

		if (data == '') {

			$('#male_allocation_table').empty()
          var tr = $("<tr/>");
          tr.append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : 'No record found'
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              }))
          $('#male_allocation_table').append(tr);

		}else{



			var no = 1;
            $('#male_allocation_table').empty()
        $.each(data, function(i, value){


        	if (value.state_code == '') {

        		var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.h_block
              })).append($("<td/>", {
                text : value.h_room
              })).append($("<td/>", {
                text : value.name
              })).append($("<td/>", {
                text : value.phone_number
              })).append($("<td/>", {
                text : value.h_batch
              })).append($("<td/>", {
                text : value.h_stream
              })).append($("<td/>", {
                text : value.h_year
              })).append($("<td/>", {
                html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.id+'" id="remove_male"> remove</a>'
              }))
              
              no++
          $('#male_allocation_table').append(tr);

        	}else{

        		var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.h_block
              })).append($("<td/>", {
                text : value.h_room
              })).append($("<td/>", {
                text : value.name
              })).append($("<td/>", {
                text : value.state_code
              })).append($("<td/>", {
                text : value.h_batch
              })).append($("<td/>", {
                text : value.h_stream
              })).append($("<td/>", {
                text : value.h_year
              })).append($("<td/>", {
                html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.id+'" id="remove_male"> remove</a>'
              }))
              
              no++
          $('#male_allocation_table').append(tr);

        	}

          
           });

		}




			
		}


	})



}


$('#male_block_proccess_btn').click(function(){

var male_block_filter =  $('#male_block_filter').val();
var male_block_and_room_block = $('#male_block_and_room_block').val();
var male_block_and_room_room = $('#male_block_and_room_room').val();
var male_manual_block = $('#male_manual_block').val();
var male_manual_room = $('#male_manual_room').val();
var male_manual_batch = $('#male_manual_batch').val();
var male_manual_stream = $('#male_manual_stream').val();
var male_manual_year = $('#male_manual_year').val();

if (male_block_filter == '') {

	alert("Block field is empty");
}else{

FetchingMaleAllocation(male_block_filter, male_block_and_room_block, male_block_and_room_room, male_manual_block, male_manual_room, male_manual_batch,male_manual_stream, male_manual_year);

}

});



$('#male_block_and_room_proccess_btn').click(function(){

var male_block_filter =  $('#male_block_filter').val();
var male_block_and_room_block = $('#male_block_and_room_block').val();
var male_block_and_room_room = $('#male_block_and_room_room').val();
var male_manual_block = $('#male_manual_block').val();
var male_manual_room = $('#male_manual_room').val();
var male_manual_batch = $('#male_manual_batch').val();
var male_manual_stream = $('#male_manual_stream').val();
var male_manual_year = $('#male_manual_year').val();

if (male_block_and_room_block == '') {

	alert("Block field is empty");
}else if(male_block_and_room_room == ''){

alert("Room field is empty");

}else{

FetchingMaleAllocation(male_block_filter, male_block_and_room_block, male_block_and_room_room, male_manual_block, male_manual_room, male_manual_batch,male_manual_stream, male_manual_year);

}

});



$('#male_manual_proccess_btn').click(function(){

var male_block_filter =  $('#male_block_filter').val();
var male_block_and_room_block = $('#male_block_and_room_block').val();
var male_block_and_room_room = $('#male_block_and_room_room').val();
var male_manual_block = $('#male_manual_block').val();
var male_manual_room = $('#male_manual_room').val();
var male_manual_batch = $('#male_manual_batch').val();
var male_manual_stream = $('#male_manual_stream').val();
var male_manual_year = $('#male_manual_year').val();

if (male_manual_block == '') {

	alert("Block field is empty");
}else if(male_manual_room == ''){

alert("Room field is empty");

}else if(male_manual_batch == ''){

alert("Batch field is empty");

}else if(male_manual_stream == ''){

alert("Stream field is empty");

}else if(male_manual_year == ''){

alert("Year field is empty");

}else{

FetchingMaleAllocation(male_block_filter, male_block_and_room_block, male_block_and_room_room, male_manual_block, male_manual_room, male_manual_batch,male_manual_stream, male_manual_year);

}

});




$('#male_refresh_btn').click(function(){

$('#male_block_filter').val('');
$('#male_block_and_room_block').val('');
$('#male_block_and_room_room').val('');
$('#male_manual_block').val('');
$('#male_manual_room').val('');
 $('#male_manual_batch').val('');
 $('#male_manual_stream').val('');
$('#male_manual_year').val('');


FetchingMaleAllocation();



});




$('#male_close_btn').click(function(){

	$('#male_block_filter_div').hide();
	$('#male_close_btn').hide();
	$('#male_block_and_room_filter_div').hide();
$('#male_manual_filter_div').hide();

$('#male_block_filter').val('');
$('#male_block_and_room_block').val('');
$('#male_block_and_room_room').val('');
$('#male_manual_block').val('');
$('#male_manual_room').val('');
 $('#male_manual_batch').val('');
 $('#male_manual_stream').val('');
$('#male_manual_year').val('');


FetchingMaleAllocation();

});




//Remove
		$('body').delegate('#remove_male', 'click', function(e){

		e.preventDefault();
		var male_user_id = $(this).data('id');
	
	if (confirm('Are you sure of this?')) {

			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('staff.removemalecorperallocated')}}",
		method:"POST",
		data:{male_user_id:male_user_id},
		success:function(data){

		//console.log(data)


			alert(data);
			FetchingMaleAllocation();
		}


	})

	}

		});



//End





















//female side


$('#female_close_btn').hide();
$('#female_block_filter_div').hide();
$('#female_block_and_room_filter_div').hide();
$('#female_manual_filter_div').hide();


$('#female_block_btn').click(function(){
	$('#female_block_filter_div').show();
	$('#female_close_btn').show();
	$('#female_block_and_room_filter_div').hide();
$('#female_manual_filter_div').hide();

$('#female_block_filter').val('');
$('#female_block_and_room_block').val('');
$('#female_block_and_room_room').val('');
$('#female_manual_block').val('');
$('#female_manual_room').val('');
 $('#female_manual_batch').val('');
 $('#female_manual_stream').val('');
$('#female_manual_year').val('');


FetchingFemaleAllocation();

});


$('#female_block_and_room_btn').click(function(){

	$('#female_block_filter_div').hide();
	$('#female_close_btn').show();
	$('#female_block_and_room_filter_div').show();
$('#female_manual_filter_div').hide();


$('#female_block_filter').val('');
$('#female_block_and_room_block').val('');
$('#female_block_and_room_room').val('');
$('#female_manual_block').val('');
$('#female_manual_room').val('');
 $('#female_manual_batch').val('');
 $('#female_manual_stream').val('');
$('#female_manual_year').val('');

FetchingFemaleAllocation();

});


$('#female_manual_btn').click(function(){

	$('#female_block_filter_div').hide();
	$('#female_close_btn').show();
	$('#female_block_and_room_filter_div').hide();
$('#female_manual_filter_div').show();

$('#female_block_filter').val('');
$('#female_block_and_room_block').val('');
$('#female_block_and_room_room').val('');
$('#female_manual_block').val('');
$('#female_manual_room').val('');
 $('#female_manual_batch').val('');
 $('#female_manual_stream').val('');
$('#female_manual_year').val('');

FetchingFemaleAllocation();


});





//Fetching male allocation record
FetchingFemaleAllocation();
function FetchingFemaleAllocation(female_block_filter='', female_block_and_room_block='', female_block_and_room_room='', female_manual_block='', female_manual_room='', female_manual_batch='',female_manual_stream='', female_manual_year=''){




		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('staff.fetchfemalecorperallocated')}}",
		method:"POST",
		data:{female_block_filter:female_block_filter,female_block_and_room_block:female_block_and_room_block,female_block_and_room_room:female_block_and_room_room,female_manual_block:female_manual_block,female_manual_room:female_manual_room,female_manual_batch:female_manual_batch,female_manual_stream:female_manual_stream,female_manual_year:female_manual_year},
		success:function(data){

		//console.log(data)

		if (data == '') {

			$('#female_allocation_table').empty()
          var tr = $("<tr/>");
          tr.append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : 'No record found'
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              }))
          $('#female_allocation_table').append(tr);

		}else{



			var no = 1;
            $('#female_allocation_table').empty()
        $.each(data, function(i, value){


        	if (value.state_code == '') {

        		var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.h_block
              })).append($("<td/>", {
                text : value.h_room
              })).append($("<td/>", {
                text : value.name
              })).append($("<td/>", {
                text : value.phone_number
              })).append($("<td/>", {
                text : value.h_batch
              })).append($("<td/>", {
                text : value.h_stream
              })).append($("<td/>", {
                text : value.h_year
              })).append($("<td/>", {
                html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.id+'" id="remove_female"> remove</a>'
              }))
              
              no++
          $('#female_allocation_table').append(tr);

        	}else{

        		var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.h_block
              })).append($("<td/>", {
                text : value.h_room
              })).append($("<td/>", {
                text : value.name
              })).append($("<td/>", {
                text : value.state_code
              })).append($("<td/>", {
                text : value.h_batch
              })).append($("<td/>", {
                text : value.h_stream
              })).append($("<td/>", {
                text : value.h_year
              })).append($("<td/>", {
                html: '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.id+'" id="remove_female"> remove</a>'
              }))
              
              no++
          $('#female_allocation_table').append(tr);

        	}

          
           });

		}




			
		}


	})



}









$('#female_block_proccess_btn').click(function(){

var female_block_filter =  $('#female_block_filter').val();
var female_block_and_room_block = $('#female_block_and_room_block').val();
var female_block_and_room_room = $('#female_block_and_room_room').val();
var female_manual_block = $('#female_manual_block').val();
var female_manual_room = $('#female_manual_room').val();
var female_manual_batch = $('#female_manual_batch').val();
var female_manual_stream = $('#female_manual_stream').val();
var female_manual_year = $('#female_manual_year').val();

if (female_block_filter == '') {

	alert("Block field is empty");
}else{
FetchingFemaleAllocation(female_block_filter, female_block_and_room_block, female_block_and_room_room, female_manual_block, female_manual_room, female_manual_batch,female_manual_stream, female_manual_year);


}

});



$('#female_block_and_room_proccess_btn').click(function(){

var female_block_filter =  $('#female_block_filter').val();
var female_block_and_room_block = $('#female_block_and_room_block').val();
var female_block_and_room_room = $('#female_block_and_room_room').val();
var female_manual_block = $('#female_manual_block').val();
var female_manual_room = $('#female_manual_room').val();
var female_manual_batch = $('#female_manual_batch').val();
var female_manual_stream = $('#female_manual_stream').val();
var female_manual_year = $('#female_manual_year').val();

if (female_block_and_room_block == '') {

	alert("Block field is empty");
}else if(female_block_and_room_room == ''){

alert("Room field is empty");

}else{

FetchingFemaleAllocation(female_block_filter, female_block_and_room_block, female_block_and_room_room, female_manual_block, female_manual_room, female_manual_batch,female_manual_stream, female_manual_year);


}

});



$('#female_manual_proccess_btn').click(function(){

var female_block_filter =  $('#female_block_filter').val();
var female_block_and_room_block = $('#female_block_and_room_block').val();
var female_block_and_room_room = $('#female_block_and_room_room').val();
var female_manual_block = $('#female_manual_block').val();
var female_manual_room = $('#female_manual_room').val();
var female_manual_batch = $('#female_manual_batch').val();
var female_manual_stream = $('#female_manual_stream').val();
var female_manual_year = $('#female_manual_year').val();

if (female_manual_block == '') {

	alert("Block field is empty");
}else if(female_manual_room == ''){

alert("Room field is empty");

}else if(female_manual_batch == ''){

alert("Batch field is empty");

}else if(female_manual_stream == ''){

alert("Stream field is empty");

}else if(female_manual_year == ''){

alert("Year field is empty");

}else{

FetchingFemaleAllocation(female_block_filter, female_block_and_room_block, female_block_and_room_room, female_manual_block, female_manual_room, female_manual_batch,female_manual_stream, female_manual_year);

}

});




$('#female_refresh_btn').click(function(){

$('#female_block_filter').val('');
$('#female_block_and_room_block').val('');
$('#female_block_and_room_room').val('');
$('#female_manual_block').val('');
$('#female_manual_room').val('');
 $('#female_manual_batch').val('');
 $('#female_manual_stream').val('');
$('#female_manual_year').val('');


FetchingFemaleAllocation();



});




$('#female_close_btn').click(function(){

	$('#female_block_filter_div').hide();
	$('#female_close_btn').hide();
	$('#female_block_and_room_filter_div').hide();
$('#female_manual_filter_div').hide();

$('#female_block_filter').val('');
$('#female_block_and_room_block').val('');
$('#female_block_and_room_room').val('');
$('#female_manual_block').val('');
$('#female_manual_room').val('');
 $('#female_manual_batch').val('');
 $('#female_manual_stream').val('');
$('#female_manual_year').val('');


FetchingFemaleAllocation();

});






//Remove
		$('body').delegate('#remove_female', 'click', function(e){

		e.preventDefault();
		var female_user_id = $(this).data('id');
	
	if (confirm('Are you sure of this?')) {

			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('staff.removefemalecorperallocated')}}",
		method:"POST",
		data:{female_user_id:female_user_id},
		success:function(data){

		//console.log(data)


			alert(data);
			FetchingFemaleAllocation();
		}


	})

	}

		});


//End





$('#update_profile_btn').click(function(event){

event.preventDefault();
var edit_name = $('#edit_name').val();
var edit_email = $('#edit_email').val();
var edit_phone_number = $('#edit_phone_number').val();

if (edit_name == '') {
alert('Name field is required');
}else if (edit_email == '') {
alert('Email field is required');
}else if (edit_phone_number == '') {
alert('Phone Number field is required');
}else{


      if (confirm('Are you sure of this?')) {
    $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('staff.updateprofile')}}",
    method:"POST",
    data:{edit_name:edit_name,edit_email:edit_email,edit_phone_number:edit_phone_number,_tokens:_tokens},
    success:function(data){

    	 $('.overlay').hide();
    //console.log(data)
    alert(data);
    window.location.reload();
       
    }

})

  }


}





});



$('#update_password_btn').click(function(event){

event.preventDefault();
var edit_password = $('#edit_password').val();
var edit_password_again = $('#edit_password_again').val();


if (edit_password == '') {
alert('Password field is required');
}else if (edit_password_again == '') {
alert('Password Again field is required');
}else if (edit_password != edit_password_again) {
alert('Password Doe not match');
}else{


      if (confirm('Are you sure of this?')) {
    $('.overlay').show();
      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('staff.updatepassword')}}",
    method:"POST",
    data:{edit_password:edit_password,_tokens:_tokens},
    success:function(data){

    	 $('.overlay').hide();
    //console.log(data)
    alert(data);
    window.location.reload();
       
    }

})

  }


}



});





$edit_image_crop = $('#edit_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:400,
    height:400,
    type: 'square'

  },

  boundary:{

    width: 400,
    height: 400
  }


});



$('#edit_image').change(function(){

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



$('#edit_image_upload_btn').click(function(event){

  event.preventDefault();

if ($('#edit_image').val() == '') {
  alert("No picture selected Yet");

}else{

  if (confirm("Are you sure?")) {
   

$('.overlay').show();
      $edit_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){

    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("staff.updateprofilepicture")}}',
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

































































	});


		</script>

		
		
	</body>


</html>