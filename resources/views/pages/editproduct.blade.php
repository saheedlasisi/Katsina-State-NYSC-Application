@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Product</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Product</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">{{$title}}</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						
						<!-- Profile Sidebar -->
						@include('inc.dashnav')
						<!-- / Profile Sidebar -->
						
<div class="col-md-7 col-lg-8 col-xl-9">
						
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Product Settings <a href="/myproduct/{{$product->product_name}}/{{$product->shop_product_id}}">[{{$product->product_name}}]</a></h4>
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs nav-tabs-solid">
			<li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab"> Information</a></li>
			
		</ul>
		<div class="tab-content">


			<div class="tab-pane show active" id="solid-tab1">

	<!-- Basic Information -->
<div class="card">

<div class="card-body">
	<h4 class="card-title">Basic Information</h4>

	<div class="row form-row">
<div class="col-md-12">
			<div class="form-group">
				<div class="change-avatar">
					<div class="profile-img">
						<img src="{{asset('assets/img/shopimage/'.$product->product_image) }}" alt="User Image">
					</div>
					<div class="upload-img">
						<button class="btn btn-primary btn-sm" id="change_product_image"><i class="fa fa-plus "></i> Change Product Image</button>
						
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label>Product Name <span class="text-danger">*</span></label>
				  <input type="text" class="form-control " name="edit_product_name" id="edit_product_name" value="{{$product->product_name}}" required >
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Product Current Price <span class="text-danger">*</span></label>
				<input type="number" class="form-control" name="edit_product_price" id="edit_product_price" value="{{$product->current_price}}" required >
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Product Old Price <span class="text-danger">*</span></label>
				 <input type="number" class="form-control" name="edit_product_old_price" id="edit_product_old_price" value="{{$product->old_price}}" required >
			</div>
		</div>


			<div class="col-md-6">
			<div class="form-group">
				<label>Product Quantity <span class="text-danger">*</span></label>
				 <input type="number" class="form-control" name="edit_product_qty" id="edit_product_qty" value="{{$product->product_qty}}" required >
			</div>
		</div>


		<div class="col-md-6">
			<input type="hidden" name="product_status" id="product_status" value="{{$product->product_status}}">
			<div class="form-group">
				<label>Product Status <span class="text-danger">*</span></label>
				 <select class="form-control" id="edit_product_status" name="edit_product_status">
				 	<option value="available">Available</option>
				 	<option value="not available">Not Available</option>
				 	
				 </select>
			</div>
		</div>

	<div class="col-md-12">
		<div class="form-group">
			<label>Product Description <span class="text-danger">*</span></label>
		<textarea class="form-control" name="edit_product_description" id="edit_product_description">{{ $product->description }}</textarea>
		</div>
	</div>

			<div class="col-md-12">
		<div class="form-group">
			<label>Product Specification <span class="text-danger">*</span></label>
		<textarea class="form-control" name="edit_product_specification" id="edit_product_specification">{{ $product->specification }}</textarea>
		</div>
</div>

		<div class="col-md-12">
		<div class="form-group">
			<label>Product Key Feature <span class="text-danger">*</span></label>
		<textarea class="form-control" name="edit_product_keyfeature" id="edit_product_keyfeature">{{ $product->key_feature }}</textarea>
		</div>
	</div>



<input type="hidden" name="product_id" id="product_id" value="{{$product->shop_product_id}}">
	
	<div class="col-md-6">
		<div class="form-group">
			<label>Updated Button <span class="text-danger">*</span></label>
		<button class="btn btn-warning form-control"  id="product_update_btn">Update</button>
		</div>
	</div>

	
	

	</div>
		</div>
	</div>
	<!-- /Basic Information -->
							

</div>






					</div>					



				</div>
			</div>
		</div>
						

							
						</div>

					</div>

				</div>

			</div>



<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();

var pstatus = $('#product_status').val();
	
	$('#edit_product_status').val(pstatus);



$('#product_update_btn').click(function(event){
  
     for (instance in CKEDITOR.instances) 
{
    CKEDITOR.instances[instance].updateElement();
}

  event.preventDefault();


  var edit_product_name = $('#edit_product_name').val();
  var product_id = $('#product_id').val();
  var edit_product_price = $('#edit_product_price').val();
  var edit_product_old_price = $('#edit_product_old_price').val();
  var edit_product_description = $('#edit_product_description').val();
   var edit_product_status = $('#edit_product_status').val();
    var edit_product_specification = $('#edit_product_specification').val();
   var edit_product_keyfeature = $('#edit_product_keyfeature').val();
   var edit_product_qty = $('#edit_product_qty').val();
 



if (edit_product_name == '') {
  alert("Please Enter Product Name");
}else if(edit_product_price == ''){
  alert("Please Enter Product Price");
}else if(edit_product_old_price == ''){
  alert("Please Enter Product Old Price");
}else if(edit_product_description == ''){
  alert("Please Enter Product Description");
}else if(edit_product_specification == ''){
  alert("Please Enter Product Specification");
}else if(edit_product_keyfeature == ''){
  alert("Please Enter Product Key Feature");
}else if(edit_product_qty == ''){
  alert("Please Enter Product Quantity");
}else{

  if (confirm("Are You Sure?")) {
  	$('.overlay').show();
   
      var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.updateproduct")}}',
      type: "POST",
      data: { _token:_token,product_id:product_id,edit_product_name:edit_product_name, edit_product_price:edit_product_price,edit_product_old_price:edit_product_old_price, edit_product_description:edit_product_description,edit_product_status:edit_product_status,edit_product_keyfeature:edit_product_keyfeature,edit_product_specification:edit_product_specification,edit_product_qty:edit_product_qty},
      dataType: "json",
      success:function(data){

        //console.log(data);
        $('.overlay').hide();

        
        window.location.reload();
       
       alert(data);
       
       
      }

    })

  
  }
}

});



$('#change_product_image').click(function(){
$('#change_productimageModal').show();
});

$('#change_productimageup').click(function(){
$('#change_productimageModal').hide();
});


$('#change_productimagedown').click(function(){
$('#change_productimageModal').hide();
});



$change_product_image_crop = $('#change_product_image-preview').croppie({

 enableExif:true,
  viewport:{
    width:400,
    height:400,
    type: 'rectangle'

  },

  boundary:{

    width: 400,
    height: 400
  }



});



$('#change_product_upload_image').change(function(){

  var reader = new FileReader();
  reader.onload = function(event){

    $change_product_image_crop.croppie('bind', {

      url:event.target.result

    }).then(function(){

      console.log('Jquery bind complete');
    });
  }

  reader.readAsDataURL(this.files[0]);

});



$('#change_product_upload_crop_image').click(function(event){

  event.preventDefault();
var change_product_image_id = $('#change_product_image_id').val();
var changing_image = $('#changing_image').val();

if ($('#change_product_upload_image').val() == '') {
  alert("No picture selected Yet");

}else{

  if (confirm("Are you sure?")) {
  	
  	$('.overlay').show();
      $change_product_image_crop.croppie('result', {

    type: 'canvas',
    size: 'viewport'
  } ).then(function(response){


    var _token = $('input[name=_token]').val();
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
      url:'{{ route("user.changeproductimage")}}',
      type: "POST",
      data: {"image":response, _token:_token,change_product_image_id:change_product_image_id,changing_image:changing_image},
      dataType: "json",
      success:function(data){

        //console.log(data);
        alert(data);
        window.location.reload();
        $('.overlay').hide();
       $('#change_productimageModal').show();
      }

    });

  });
  }
}

});








});
</script>	

@include('inc.changepassword')
@include('inc.changeproductimage')
@endsection