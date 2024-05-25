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
									<li class="breadcrumb-item active" aria-current="page">Cds</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Edit Cds Project</h2>
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
							<div class="doc-review review-listing">

								<div class="row mb-5">
                                    <div class="col">
                                        <ul class="nav nav-tabs nav-tabs-solid">
                                            
                                            <li class="nav-item active">
                                                  <a class="nav-link" href="{{route('obs.cds')}}">Projects</a>
                                            </li>
                                        </ul>
                                    </div>
                                
                                </div>
			
								


  <!-- Add Blog -->
	<div class="card">
		<div class="card-body">	
			<h3 class="pb-3">Edit Cds Project: [{{$cds->project_topic}}]</h3>
	<form>
		{{ csrf_field() }}
											
<div class="service-fields mb-3">
	<div class="row">



<div class="col-md-12">
			<div class="form-group">
				<div class="change-avatar">
					<div class="profile-img">
						<img src="{{asset('assets/img/cdsimage/'.$cds->project_image) }}" alt="User Image">
					</div>
					
				</div>
			</div>
		</div>


		<div class="col-lg-4">
		<div class="form-group">
	<label>Project Title <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="edit_cds_topic" id="edit_cds_topic" value="{{$cds->project_topic}}">
	</div>
	</div>

	

	<div class="col-lg-4">
		<div class="form-group">
	<label>Executor, (Corpsmember) <span class="text-danger">*</span></label>
	<select class="form-control select" name="edit_cds_user_id" id="edit_cds_user_id"> 
	<option value="">Select Corps member</option>
	@foreach($users as $user)
	<option value="{{$user->id}}">{{$user->state_code}}, {{$user->name}}, {{$user->phone_number}}</option>
	@endforeach
	</select>
	</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
	<label>Sponsored_By <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="edit_cds_sponsored_by" id="edit_cds_sponsored_by" value="{{$cds->sponsored_by}}">
	</div>
	</div>

	</div>
</div>
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
	<label>Details <span class="text-danger">*</span></label>
	<textarea id="edit_cds_detail" class="form-control service-desc" name="edit_cds_detail">{{$cds->project_detail}}</textarea>
			</div>
		</div>
	</div>
</div>

<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="cds_edit_upload_btn">Upload</button>
	</div>

</form>

	</div>
</div>
<!-- /Add Blog --> 

<input type="hidden" name="cds_id" id="cds_id" value="{{$cds->cds_project_id}}">

<!-- Clinic Info -->
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Slide Photos</h4>

			<div class="row form-row">
			
			<form id="upload_slide_image_form" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
					<div class="col-md-12">
						
						<div class="alert" id="message" style="display: none;"></div>
		<div class="form-group">
			<label>Upload Photos <span class="text-danger">*</span></label>
			<input type="hidden" name="photo_cds_id" id="photo_cds_id" value="{{$cds->cds_project_id}}">

			<input type="file" name="slide_photo" id="slide_photo" accept="image/jpeg," class="form-control">

			<input type="submit" id="upload_slidephoto_btn" name="upload_slidephoto_btn" class="btn btn-success btn-sm" style="margin-top: 3px;">

		</div>
	</div>
					
</form>

<div class="col-md-12">
		<div class="form-group">
			<label>Uploaded Photos</label>
			<form action="#" class="dropzone"></form>
		</div>
						<div class="upload-wrap">

							@if(count($photos) > 0)
							@foreach($photos as $photo)
							<div class="upload-images">
								<img src="{{ asset('assets/img/cdsimage/'.$photo->photo) }}" alt="Upload Image">
		<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm" data-id="{{$photo->cds_slide_photo_id}}" id="delete_slide_photo"><i class="far fa-trash-alt"></i></a>
							</div>
							@endforeach
							@else 
							<center><h6>NO RECORD FOUND</h6></center>

							@endif
							

						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Clinic Info -->			








<!-- Clinic Info -->
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Here you can change project image</h4>

	<div class="service-fields mb-3" style="border-right: 1px solid #ddd;">

	<div class="row">
	<div class="col-lg-12">
	<div id="edit_cds_image_preview">

														
	</div>	

	</div>
	</div>

	<div class="row">
	<div class="col-lg-12">
	<div class="service-upload">
<i class="fas fa-cloud-upload-alt"></i>
<span>Project Images *</span>
<input type="file" name="edit_cds_image" id="edit_cds_image" accept="image/jpeg, image/png, image/gif,">

</div>	

</div>
</div>
</div>

<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="cds_edit_image_upload_btn">Upload</button>
	</div>
				</div>
			</div>
		</div>
		<!-- /Clinic Info -->			









							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->





<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){

var user_id = <?php echo $cds->user_id ?>;


$('#edit_cds_user_id').val(user_id);



$cds_image_crop = $('#cds_image_preview').croppie({

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



$('#cds_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $cds_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#cds_upload_btn').click(function(event){

	      for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	event.preventDefault();

	var cds_topic = $('#cds_topic').val();
	var cds_sponsored_by = $('#cds_sponsored_by').val();
	var cds_user_id = $('#cds_user_id').val();
	var cds_image = $('#cds_image').val();
	var cds_from_date = $('#cds_from_date').val();
	var cds_to_date = $('#cds_to_date').val();
	var cds_detail = $('#cds_detail').val();

	if (cds_topic == '') {
		alert('Top field is empty');
	}else if (cds_sponsored_by == '') {
	alert('Sponsored_By field is empty');
	}else if (cds_user_id == '') {
		alert('Corpsmember field is empty');
	}else if (cds_image == '') {
		alert('Image field is empty');
	}else if (cds_from_date == '') {
		alert('From Date field is empty');
	}else if (cds_to_date == '') {
		alert('To Date field is empty');
	}else if (cds_detail == '') {
		alert('Detail field is empty');
	}else{

		if (confirm("Are you sure you?")) {
			$('.overlay').show();

	$cds_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.storecds")}}',
      type: "POST",
      data: {"image":response, _token:_token,cds_topic:cds_topic,cds_sponsored_by:cds_sponsored_by,cds_user_id:cds_user_id,cds_from_date:cds_from_date,cds_to_date:cds_to_date,cds_detail:cds_detail },
      dataType: "json",
      success:function(data){

      	alert(data);
      	 window.location.reload();
      	$('.overlay').hide();
        //console.log(data);
       
      }

    });

  });


		}
	}


});





$('#cds_edit_upload_btn').click(function(event){

	for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

	event.preventDefault();

	var edit_cds_topic = $('#edit_cds_topic').val();
	var edit_cds_sponsored_by = $('#edit_cds_sponsored_by').val();
	var edit_cds_user_id = $('#edit_cds_user_id').val();
	var edit_cds_detail = $('#edit_cds_detail').val();



if (edit_cds_topic == '') {
		alert('Top field is empty');
	}else if (edit_cds_sponsored_by == '') {
	alert('Sponsored_By field is empty');
	}else if (edit_cds_user_id == '') {
		alert('Corpsmember field is empty');
	}else if (edit_cds_detail == '') {
		alert('Detail field is empty');
	}else{

		if (confirm("Are you sure you?")) {
			$('.overlay').show();

	var _token = $('input[name=_token]').val();
	var cds_id = $('#cds_id').val();

			    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.updatecds")}}',
      type: "POST",
      data: {cds_id:cds_id,_token:_token,edit_cds_topic:edit_cds_topic,edit_cds_sponsored_by:edit_cds_sponsored_by,edit_cds_user_id:edit_cds_user_id,edit_cds_detail:edit_cds_detail },
      success:function(data){

      	alert(data);
      	 window.location.reload();
      	$('.overlay').hide();
        //console.log(data);
       
      }

    });


		}

	}




});





$edit_cds_image_crop = $('#edit_cds_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:500,
    height:300,
    type: 'rectangle'

  },

  boundary:{

    width: 500,
    height: 300
  }


});



$('#edit_cds_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $edit_cds_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#cds_edit_image_upload_btn').click(function(event){


	event.preventDefault();

	
	var edit_cds_image = $('#edit_cds_image').val();
	var cds_id = $('#cds_id').val();

	if (edit_cds_image == '') {
		alert('Image field is empty');
	}else{

		if (confirm("Are you sure you?")) {
			$('.overlay').show();

	$edit_cds_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.updatecdsimage")}}',
      type: "POST",
      data: {"image":response, _token:_token, cds_id:cds_id},
      dataType: "json",
      success:function(data){

      	alert(data);
      	 window.location.reload();
      	$('.overlay').hide();
        //console.log(data);
       
      }

    });

  });


		}
	}


});









$('#upload_slide_image_form').on('submit', function(event){

  event.preventDefault();

  var slide_photo = $('#slide_photo').val();

  if (slide_photo == '') {

$('#message').css('display', 'block');
$('#message').html('Selet a picture first');
$('#message').addClass('alert-danger');


  }else{

$.ajax({
    url:"{{ route('obs.uploadcdsslideimage') }}",
    method:"POST",
    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){

      

if (data.message == 'Image Uploaded Successfully') {

  // console.log(data);
  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);
     window.location.reload();
}else{

  $('#message').css('display', 'block');
      $('#message').html(data.message);
      $('#message').addClass(data.class_name);

}
     

    }


  });

  }


});


$('body').delegate('#delete_slide_photo', 'click', function(e){

    e.preventDefault();
    var photo_id = $(this).data('id');
     var _token = $('input[name=_token]').val();

      if (confirm('Are you sure of this?')) {

      $.ajax({

    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
    url:"{{route('obs.deletecdsslideimage')}}",
    method:"POST",
    data:{photo_id:photo_id,_token:_token},
    success:function(data){

    //console.log(data)
    alert(data);
    window.location.reload();

    }

})

  }


});











	});
</script>









@include('ObsInc.changepassword')
@endsection