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
									<li class="breadcrumb-item active" aria-current="page">Slide</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Add Slide</h2>
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
                                                  <a class="nav-link" href="{{route('obs.slide')}}">Slide</a>
                                            </li>
                                        </ul>
                                    </div>
                                
                                </div>
			
								


  <!-- Add Blog -->
	<div class="card">
		<div class="card-body">	
			<h3 class="pb-3">Add Slide Picture</h3>
	<form>
		{{ csrf_field() }}
											


											
<div class="service-fields mb-3" style="border-right: 1px solid #ddd;">

	<div class="row">
	<div class="col-lg-12">
	<div id="slide_image_preview">

														
	</div>	

	</div>
	</div>

	<div class="row">
	<div class="col-lg-12">
	<div class="service-upload">
<i class="fas fa-cloud-upload-alt"></i>
<span>Project Images *</span>
<input type="file" name="slide_image" id="slide_image" accept="image/jpeg, image/png, image/gif,">
														
</div>	

</div>
</div>
</div>

<div class="submit-section">
	<button class="btn btn-primary submit-btn"  value="upload" id="slide_upload_btn">Upload</button>
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

$slide_image_crop = $('#slide_image_preview').croppie({

  enableExif:true,
  viewport:{
    width:1000,
    height:400,
    type: 'rectangle'

  },

  boundary:{

    width: 900,
    height: 400
  }


});



$('#slide_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $slide_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#slide_upload_btn').click(function(event){

	event.preventDefault();

	var slide_image = $('#slide_image').val();
	

	if (slide_image == '') {
		alert('Image field is empty');
	}else{

		if (confirm("Are you sure you?")) {
			$('.overlay').show();

			$slide_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("obs.storeslide")}}',
      type: "POST",
      data: {"image":response,_token:_token},
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