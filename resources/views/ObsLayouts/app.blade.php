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
<div class="overlay"><div class="loader"></div></div>		
<!-- Main Wrapper -->
		<div class="main-wrapper">
@include('ObsInc.header')

	 @yield('content')

@include('ObsInc.footer')

			   </div>
	   <!-- /Main Wrapper -->
	  
		
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




<script>
		CKEDITOR.replace( 'cds_detail',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>

<script>
		CKEDITOR.replace( 'edit_cds_detail',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>

<script>
		CKEDITOR.replace( 'blog_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );
	
</script>
<script>

	CKEDITOR.replace('edit_blog_content', {
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>

	CKEDITOR.replace('info_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>

	CKEDITOR.replace('edit_info_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>

	CKEDITOR.replace('lecture_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>

	CKEDITOR.replace('edit_lecture_content',{
        filebrowserUploadUrl: "{{route('main.ckeditorupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>
	CKEDITOR.replace('reply_question_content');
</script>
		<script type="text/javascript">
			$(document).ready(function(){


var _tokens = $('input[name=_token]').val();







//adding category

	$('#add_category').click(function(){

		$('#categoryModal').show();
		
	});

	$('#categoryup').click(function(){

		$('#categoryModal').hide();
		
	});

	$('#categorydown').click(function(){

		$('#categoryModal').hide();
		
	});


	 $('#category_form').on('submit', function(e){
	 	 e.preventDefault();

	 	 var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

	 	if ($('#category_name').val() == '') {

	 		alert("Please Enter Category Name");

	 	}else{


	 		if (confirm("Are you sure?")) {
        $('.overlay').show();
        $('#categoryModal').hide();

	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);

    alert(data);
    $('#category_form').trigger('reset');
    GetCategory();
    $('.overlay').hide();
    $('#categoryModal').show();

    }


  })
	 		}



	 	}	 

	});






GetCategory();
	 function GetCategory(){
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.getcategory')}}",
		method:"POST",
		data:{_tokens:_tokens},
		success:function(data){

		//console.log(data)
$('#category_table').empty();
		if (data == '') {

			$('#category_table').empty();
          var tr = $("<tr/>");
          tr.append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : 'No record found'
              })).append($("<td/>", {
                text : ''
              })).append($("<td/>", {
                text : ''
              }))
          $('#category_table').append(tr);

		}else {
			var no = 1;
            $('category_table').empty();
        $.each(data, function(i, value){

        	var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.category_name
              })).append($("<td/>", {
                text : moment(value.created_at).format('DD-MM-YYYY')
              })).append($("<td/>", {
                html : '<a href="javascript:void(0);" class="btn btn-primary btn-sm" data-name="'+value.category_name+'" data-id="'+value.c_id+'" id="edit_category"> edit</a>'
              })).append($("<td/>", {
                html : '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.c_id+'" id="remove_category"> remove</a>'
              }))
				 no++
          $('#category_table').append(tr);

        

          });	

	$('#category_data_table').DataTable();

		}

		
		}


	})

	 }





//Remove category 
		$('body').delegate('#remove_category', 'click', function(e){

		e.preventDefault();
		var c_id = $(this).data('id');

			if (confirm('Are you sure of this?')) {
    $('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.removecategory')}}",
		method:"POST",
		data:{c_id:c_id,_tokens:_tokens},
		success:function(data){

		//console.log(data)
		 GetCategory();
			alert(data);
			    $('.overlay').hide();
		}


	})

	}


});






//Update category 
		$('body').delegate('#edit_category', 'click', function(e){

		e.preventDefault();
		var u_c_id = $(this).data('id');
		var u_c_name = $(this).data('name');

		$('#update_categoryModal').show();

		$('#update_category_name').val(u_c_name);
		$('#update_c_id').val(u_c_id);


		

	});


	$('#update_categoryup').click(function(){

		$('#update_categoryModal').hide();
		
	});

	$('#update_categorydown').click(function(){

		$('#update_categoryModal').hide();
		
	});
	





$('#update_category_form').on('submit', function(e){
	 	 e.preventDefault();

	 	 var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

	 	if ($('#update_category_name').val() == '') {

	 		alert("Please Enter Category Name");

	 	}else{


	 		if (confirm("Are you sure?")) {
            $('.overlay').show();
            $('#update_categoryModal').hide();
	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);

    alert(data);
    GetCategory();
    $('.overlay').hide();
	GetBlogCategories();
  $('#update_categoryModal').hide();

    }


  })
	 		}



	 	}	 

	});

//Category's part ends here;







//Blog

$image_crop = $('#blog_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:600,
    height:300,
    type: 'rectangle'

  },

  boundary:{

    width: 600,
    height: 300
  }


});

$('#blog_upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#blog_upload_btn').click(function(event){

	      for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	event.preventDefault();

	var blog_title = $('#blog_title').val();

	var blog_category = $('#blog_category').val();

	var blog_content = $('#blog_content').val();

	var blog_image = $('#blog_upload_image').val();

	if (blog_title == '') {
		alert('Title field is empty');
	}else if (blog_category == '') {
	alert('Category field is empty');
	}else if (blog_content == '') {
		alert('Content field is empty');
	}else if (blog_image == '') {
		alert('Image field is empty');
	}else{

		if (confirm("Are you sure you?")) {
 $('.overlay').show();

			$image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.postblog")}}',
      type: "POST",
      data: {"image":response, _token:_token,blog_title:blog_title,blog_category:blog_category,blog_content:blog_content, },
      dataType: "json",
      success:function(data){

      	alert(data);
      	 window.location.reload();
        //console.log(data);
        $('.overlay').hide();
      }

    });

  });


		}
	}


});


GetBlogCategories();

function GetBlogCategories(){

 $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "{{route('obs.getblogcategories')}}",
    data:{_tokens:_tokens},
    success: function(data){

     var blog_category_empty = '<option value="">Select Category</option>';

     var edit_blog_category_empty = '<option value="">Select Category</option>';
    
     //console.log(data);
   
    $('#blog_category').empty();
     $('#blog_category').append(blog_category_empty);
$.each(data, function(i, value){
var blog_category_id = '<option value="'+value.c_id+'">'+value.category_name+'</option>';
$('#blog_category').append(blog_category_id);

});



$('#edit_blog_category').empty();
     $('#edit_blog_category').append(edit_blog_category_empty);
$.each(data, function(i, value){
var edit_blog_category_id = '<option value="'+value.c_id+'">'+value.category_name+'</option>';
$('#edit_blog_category').append(edit_blog_category_id);

});
var c_r_b = $('#c_r_b').val();
			$('#edit_blog_category').val(c_r_b);

    }


  })


}







//Inactivate  
		$('body').delegate('#blog_inactive_btn', 'click', function(e){

		e.preventDefault();
		var inactive_id = $(this).data('id');
		
				if (confirm('Are you sure ?')) {
 $('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.inactiveblog')}}",
		method:"POST",
		data:{inactive_id:inactive_id},
		success:function(data){

	//console.log(data)
		alert(data);
		window.location.reload();
			 $('.overlay').hide();
		}


	})

	}


});







//Activate  
		$('body').delegate('#blog_activate_btn', 'click', function(e){

		e.preventDefault();
		var activate_id = $(this).data('id');
		
				if (confirm('Are you sure ?')) {
 $('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.activateblog')}}",
		method:"POST",
		data:{activate_id:activate_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
		window.location.reload();
			 $('.overlay').hide();
		}


	})

	}


});




//Delete Blog 
		$('body').delegate('#blog_deletion_btn', 'click', function(e){

		e.preventDefault();
		var delete_id = $(this).data('id');
		
				if (confirm('Are you sure ?')) {
 $('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deleteblog')}}",
		method:"POST",
		data:{delete_id:delete_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
		window.location.reload();
     $('.overlay').hide();
			
		}


	})

	}


});



//Editing Blog
$('#edit_blog_form').on('submit', function(e){
	 	
 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	e.preventDefault();
	var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

var edit_blog_title = $('#edit_blog_title').val();

	var edit_blog_category = $('#edit_blog_category').val();

	var edit_blog_content = $('#edit_blog_content').val();

		if (edit_blog_title == '') {
		alert('Title field is empty');
	}else if (edit_blog_category == '') {
	alert('Category field is empty');
	}else if (edit_blog_content == '') {
		alert('Content field is empty');
	}else{

		if (confirm("Are you sure?")) {
 $('.overlay').show();

	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);

    alert(data.status);
 window.location.href = '.'+'/'+data.title;
  $('.overlay').hide();

    }


  })
	 		}

	}




});




$editimage_crop = $('#edit_blog_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:600,
    height:300,
    type: 'rectangle'

  },

  boundary:{

    width: 600,
    height: 300
  }


});


$('#edit_blog_upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $editimage_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#edit_image_btn').click(function(event){

event.preventDefault();
var edit_blog_id = $('#edit_blog_id').val();
 var edit_blog_image = $('#edit_blog_upload_image').val();

if (edit_blog_image == '') {

alert('you must select an image');

 }else {

 	if (confirm("Are You Sure?")) {
 $('.overlay').show();
$editimage_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


   var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.updateblogimage") }}',
      type: "POST",
      data: {"image":response, _token:_token, edit_blog_id:edit_blog_id},
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
//Blog Ends here


//Information zone

//adding information

	$('#create_an_information').click(function(){

		$('#infoModal').show();
		
	});

	$('#infoup').click(function(){

		$('#infoModal').hide();
		
	});

	$('#infodown').click(function(){

		$('#infoModal').hide();
		
	});


$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.getdetailsforinfo')}}",
		method:"POST",
		data:{_tokens:_tokens},
		success:function(data){

		//console.log(data)

		// var get_info_batch = '<option value="'+data.batch+'">'+data.batch+'</option>';
		// var get_info_stream = '<option value="'+data.stream+'">'+data.stream+'</option>';
		// var get_info_year = '<option value="'+data.year+'">'+data.year+'</option>';

		$('#info_batch').val(data.batch);
		$('#info_stream').val(data.stream);
		$('#info_year').val(data.year);
		
		}


	});



$('#information_form').on('submit', function(e){
	 	

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
	var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');

var info_title = $('#info_title').val();
var info_signature = $('#info_signature').val();
var info_content = $('#info_content').val();

if(info_title == '') {

alert('Title is required');

}else if(info_signature == '') {

alert('Signature is required');

}else if(info_content == '') {

alert('Content is required');

}else{

if (confirm("Are you sure?")) {
 $('.overlay').show();
 $('#infoModal').hide();

	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
    alert(data);
     getInformation();
       $('#information_form').trigger('reset');
       CKEDITOR.instances['info_content'].setData('');
       $('.overlay').hide();
       $('#infoModal').show();

    }


  })

}

}


});


getInformation();

function getInformation(){

  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('obs.getinformation')}}",
    method:"POST",
    data:{_tokens:_tokens},
    success:function(data){

    //console.log(data)
$('#information_table').empty();
        if (data == '') {
$('#information_table').empty();
          var information_table = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#information_table').append(information_table);
        }else{
$('#information_table').empty();
            $.each(data, function(i, value){
    var information_table = '<li><div class="experience-user"><div class="before-circle"></div></div><div class="experience-content"><div class="timeline-content"><p class="exp-year">'+moment(value.created_at).format('DD-MM-YYYY')+'</p><h4 class="exp-title">'+value.i_title+'</h4><p>'+value.i_info+' </p><a href="javascript:void(0);" class="btn btn-primary btn-sm" data-title="'+value.i_title+'"  data-batch="'+value.i_batch+'"data-stream="'+value.i_stream+'"data-year="'+value.i_year+'" data-signature="'+value.i_signed+'" data-content="'+value.i_info+'" data-status="'+value.obs_info_status+'" data-id="'+value.i_id+'" id="edit_information"> edit</a> <a href="javascript:void(0);" class="btn btn-danger btn-sm" data-id="'+value.i_id+'" id="remove_information"> remove</a> Batch: '+value.i_batch+' , Stream: '+value.i_stream+', Year: '+value.i_year+'</div></div></li> ';

    $('#information_table').append(information_table);

        });

        }
        
            
        }

    



  });


}




//Delete Informarion 
		$('body').delegate('#remove_information', 'click', function(e){

		e.preventDefault();
		var delete_info_id = $(this).data('id');
		
				if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deleteinformation')}}",
		method:"POST",
		data:{delete_info_id:delete_info_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
		getInformation();
    $('.overlay').hide();
			
		}


	})

	}


});





//Update information 
		$('body').delegate('#edit_information', 'click', function(e){

		e.preventDefault();
		var edit_info_id = $(this).data('id');
		var edit_info_title = $(this).data('title');	
		var edit_info_content = $(this).data('content');	
		var edit_info_signature = $(this).data('signature');	
		var edit_info_batch = $(this).data('batch');	
		var edit_info_year = $(this).data('year');	
		var edit_info_stream = $(this).data('stream');
		var edit_info_status = $(this).data('status');

		 $('#edit_infoModal').show();

		 CKEDITOR.instances['edit_info_content'].setData(edit_info_content);
		$('#edit_info_signature').val(edit_info_signature);
		 $('#edit_info_title').val(edit_info_title);
		 	 $('#edit_info_status').val(edit_info_status);
		 	 	 $('#edit_info_id').val(edit_info_id);


// 		var edit_info_batch = '<option value="'+edit_info_batch+'">'+edit_info_batch+'</option>';
// var edit_info_stream = '<option value="'+edit_info_stream+'">'+edit_info_stream+'</option>';
// 		var edit_info_year = '<option value="'+edit_info_year+'">'+edit_info_year+'</option>';

		$('#edit_info_batch').val(edit_info_batch);
		$('#edit_info_stream').val(edit_info_stream);
		$('#edit_info_year').val(edit_info_year);
		

	});
	$('#edit_infoup').click(function(){

		$('#edit_infoModal').hide();
		
	});

	$('#edit_infodown').click(function(){

		$('#edit_infoModal').hide();
		
	});





	$('#edit_information_form').on('submit', function(e){
	 	

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
	var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');

var e_info_title = $('#edit_info_title').val();
var e_info_signature = $('#edit_info_signature').val();
var e_info_content = $('#edit_info_content').val();
var e_info_status = $('#edit_info_status').val();

if(e_info_title == '') {

alert('Title is required');

}else if(e_info_signature == '') {

alert('Signature is required');

}else if(e_info_content == '') {

alert('Content is required');

}else if(e_info_status == '') {

alert('Status is required');

}else{

if (confirm("Are you sure?")) {

$('.overlay').show();
  $('#edit_infoModal').hide();
	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
    alert(data);
    $('.overlay').hide();
      $('#edit_infoModal').show();
       getInformation();

    }


  })

}

}


});


//Information Ends here


//Lecture

$('#lecture_form').on('submit', function(e){
	 	

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
	var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');

var lecture_topic = $('#lecture_topic').val();
var lecturer_name = $('#lecturer_name').val();
var lecture_content = $('#lecture_content').val();

if(lecture_topic == '') {

alert('Topic is required');

}else if(lecturer_name == '') {

alert('Lecturer Name is required');

}else if(lecture_content == '') {

alert('Content is required');

}else{

	if (confirm("Are you sure?")) {
$('.overlay').show();
		$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

   // console.log(data);
    alert(data);
   
       $('#lecture_form').trigger('reset');
       CKEDITOR.instances['lecture_content'].setData('');
      
$('.overlay').hide();
    }


  })

	}
}


});



//Fetching lectures
FetchLecture();
function FetchLecture(){

$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.fetchlecture')}}",
		method:"POST",
		data:{_tokens:_tokens},
		success:function(data){

		//console.log(data)

		$('#lecture_table').empty();
		
		if (data == '') {

				$('#lecture_table').empty();
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
              }))
          $('#lecture_table').append(tr);

		}else{


			var no = 1;
            $('#lecture_table').empty();
        $.each(data, function(i, value){

        	var tr = $("<tr/>");
              tr.append($("<td/>", {
                text : no
              })).append($("<td/>", {
                text : value.l_topic
              })).append($("<td/>", {
                text : value.lecturer_name
              })).append($("<td/>", {
                text : value.l_batch
              })).append($("<td/>", {
                text : value.l_stream
              })).append($("<td/>", {
                text : value.l_year
              })).append($("<td/>", {
                text : value.l_question
              })).append($("<td/>", {
                text : value.l_view
              })).append($("<td/>", {
                text : moment(value.created_at).format('DD-MM-YYYY')
              })).append($("<td/>", {
                html : '<a href="showlecture/'+value.l_id+'" class="btn btn-warning btn-sm" data-id="'+value.l_id+'" id="manage_lecture"> Manage</a>'
              }))
				 no++
          $('#lecture_table').append(tr);

                });	

	$('#lecture_data_table').DataTable();


		}

		
		}


	});


}





//Update Lecture 
		$('body').delegate('#edit_lecture', 'click', function(e){

		e.preventDefault();
		var edit_lecture_id = $(this).data('id');
		var edit_lecture_topic = $(this).data('topic');	
		var edit_lecture_content = $(this).data('content');	
		var edit_lecture_status = $(this).data('status');	
		var edit_lecturer_name = $(this).data('name');
    var edit_lecture_batch = $(this).data('batch');
      var edit_lecture_stream = $(this).data('stream');
        var edit_lecture_year = $(this).data('year');
		
		$('#edit_lectureModal').show();


		CKEDITOR.instances['edit_lecture_content'].setData(edit_lecture_content);
		$('#edit_lecture_topic').val(edit_lecture_topic);
		 $('#edit_lecture_status').val(edit_lecture_status);
		 	 $('#edit_lecturer_name').val(edit_lecturer_name);
		 	 	 $('#edit_lecture_id').val(edit_lecture_id);
             $('#edit_lecture_batch').val(edit_lecture_batch);
                 $('#edit_lecture_stream').val(edit_lecture_stream);
                     $('#edit_lecture_year').val(edit_lecture_year);


});


		$('#edit_lectureup').click(function(){

		$('#edit_lectureModal').hide();
		
	});

	$('#edit_lecturedown').click(function(){

		$('#edit_lectureModal').hide();
		
	});






$('#edit_lecture_form').on('submit', function(e){
	 	

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
	var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');

var e_lecture_topic = $('#edit_lecture_topic').val();
var e_lecture_status = $('#edit_lecture_status').val();
var e_lecture_content = $('#edit_lecture_content').val();
var e_lecturer_name = $('#edit_lecturer_name').val();

if(e_lecture_topic == '') {

alert('Topic is required');

}else if(e_lecturer_name == '') {

alert('Lecturer name is required');

}else if(e_lecture_content == '') {

alert('Content is required');

}else if(e_lecture_status == '') {

alert('Status is required');

}else{

if (confirm("Are you sure?")) {

$('.overlay').show();
$('#edit_lectureModal').hide();
	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
    alert(data);
   window.location.reload();
   $('.overlay').hide();
			
  

    }


  })

}

}


});




//Activate  
		$('body').delegate('#reply_question', 'click', function(e){

		e.preventDefault();
		var q_id = $(this).data('id');
		var q_status = $(this).data('status');
		var q_reply = $(this).data('reply');

		$('#replyquestionModal').show();

		CKEDITOR.instances['reply_question_content'].setData(q_reply);
		$('#q_id').val(q_id);
		 $('#edit_q_status').val(q_status);
		 	
});

$('#replyquestionup').click(function(){

		$('#replyquestionModal').hide();
		
	});

	$('#replyquestiondown').click(function(){

		$('#replyquestionModal').hide();
		
	});





$('#reply_lecture_question_form').on('submit', function(e){
	 	

 for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

e.preventDefault();
	var data = $(this).serialize();
    var url = $(this).attr('action');
    var post = $(this).attr('method');

var reply_question_content = $('#reply_question_content').val();
var edit_q_status = $('#edit_q_status').val();


if(reply_question_content == '') {

alert('Reply is required');

}else if(edit_q_status == '') {

alert('Status is required');

}else{

if (confirm("Are you sure?")) {

 $('.overlay').show();
    $('#replyquestionModal').hide();
	 			$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    //console.log(data);
    alert(data);
   window.location.reload();

			 $('.overlay').hide();
  

    }


  })

}

}


});






//Delete Lecture 
		$('body').delegate('#remove_lecture', 'click', function(e){

		e.preventDefault();
		var remove_lecture_id = $(this).data('id');
		
				if (confirm('Are you sure ?')) {
 $('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.removelecture')}}",
		method:"POST",
		data:{remove_lecture_id:remove_lecture_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	window.location.href = "{{route('obs.lectures')}}";
			 $('.overlay').hide();
		}


	})

	}


});





$('#saed_registration_btn').click(function(){

		$('#saedModal').show();
		
	});

	$('#saedup').click(function(){

		$('#saedModal').hide();
		
	});

	$('#saeddown').click(function(){

		$('#saedModal').hide();
		
	});





	$('#saed_form').on('submit', function(e){

	e.preventDefault();
	var data = $(this).serialize();
      var url = $(this).attr('action');
      var post = $(this).attr('method');

var saed_name = $('#saed_name').val();
var saed_email = $('#saed_email').val();
var saed_origin = $('#saed_origin').val();
var saed_lga = $('#saed_lga').val();

		if (saed_name == '') {
		alert('Name field is empty');
	}else if (saed_email == '') {
	alert('Email field is empty');
	}else if (saed_origin == '') {
		alert('Origin field is empty');
	}else if (saed_lga == '') {
		alert('LGA field is empty');
	}else{

		if (confirm("Are you sure?")) {
$('#saedModal').hide();
 $('.overlay').show();

$.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: post,
    url: url,
    data: data,
    success: function(data){

    // console.log(data);

    alert(data);
    $('#saed_form').trigger('reset');
       window.location.reload();
    $('.overlay').hide();



    }


  })
	 		}

	}




});



		$('body').delegate('#delete_saed_btn', 'click', function(e){

		e.preventDefault();
		var saed_id = $(this).data('id');
		
		if (confirm('Are you sure ?')) {
$('.overlay').show();
			$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.deletesaedmaster')}}",
		method:"POST",
		data:{saed_id:saed_id,_tokens:_tokens},
		success:function(data){

	//console.log(data)
		alert(data);
	     window.location.reload();
    $('.overlay').hide();
			
		}


	})

	}


});


$('#update_profile_btn').click(function(e){

e.preventDefault();

var edit_name = $('#edit_name').val();
var edit_email = $('#edit_email').val();

if (edit_name == '') {
	alert('Name field is empty');
}else if(edit_email == ''){
	alert('Email field is empy');
}else {

	if (confirm("Are you sure?")) {
$('.overlay').show();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.updateprofile')}}",
		method:"POST",
		data:{edit_name:edit_name,edit_email:edit_email,_tokens:_tokens},
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
    width:400,
    height:400,
    type: 'square'

  },

  boundary:{

    width: 400,
    height: 400
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
      url:'{{ route("obs.changeimage")}}',
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
$('#changepasswordModal').hide();
		$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},		
		url:"{{route('obs.updatepassword')}}",
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








});
		</script>

	
		
		
	</body>


</html>