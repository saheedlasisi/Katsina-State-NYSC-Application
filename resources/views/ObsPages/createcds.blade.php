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
							<h2 class="breadcrumb-title">Add Cds Project</h2>
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
			<h3 class="pb-3">Add Cds Project</h3>
	<form>
		{{ csrf_field() }}
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-4">
		<div class="form-group">
	<label>Project Title <span class="text-danger">*</span></label>
	<input class="form-control" type="text" name="cds_topic" id="cds_topic" >
	</div>
	</div>

	

	<div class="col-lg-4">
		<div class="form-group">
	<label>Executor, (Corpsmember) <span class="text-danger">*</span></label>
	<select class="form-control select" name="cds_user_id" id="cds_user_id"> 
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
	<input class="form-control" type="text" name="cds_sponsored_by" id="cds_sponsored_by" >
	</div>
	</div>

	</div>
</div>
											
<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-12">
			<div class="form-group">
	<label>Details <span class="text-danger">*</span></label>
	<textarea id="cds_detail" class="form-control service-desc" name="cds_detail"></textarea>
			</div>
		</div>
	</div>
</div>


<div class="service-fields mb-3">
	<div class="row">
		<div class="col-lg-6">
		<div class="form-group">
	<label>From <span class="text-danger">*</span></label>
	<input class="form-control" type="date" name="cds_from_date" id="cds_from_date" >
	</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
	<label>To <span class="text-danger">*</span></label>
<input class="form-control" type="date" name="cds_to_date" id="cds_to_date" >
	</div>
	</div>
	</div>
</div>


											
<div class="service-fields mb-3" style="border-right: 1px solid #ddd;">

	<div class="row">
	<div class="col-lg-12">
	<div id="cds_image_preview">

														
	</div>	

	</div>
	</div>

	<div class="row">
	<div class="col-lg-12">
	<div class="service-upload">
<i class="fas fa-cloud-upload-alt"></i>
<span>Project Images *</span>
<input type="file" name="cds_image" id="cds_image" accept="image/jpeg, image/png, image/gif,">
														
</div>	

</div>
</div>
</div>

<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="cds_upload_btn">Upload</button>
	</div>
</form>

	</div>
</div>
<!-- /Add Blog -->                              


							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){

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











	});
</script>









@include('ObsInc.changepassword')
@endsection