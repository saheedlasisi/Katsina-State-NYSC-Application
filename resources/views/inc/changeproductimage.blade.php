<!-- Modal -->
<div id="change_productimageModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Change Product Image</h4>

        <button type="button" id="change_productimageup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


      <div class="row">
        <input type="hidden" name="change_product_image_id" id="change_product_image_id" value="{{$product->shop_product_id}}">
        <input type="hidden" name="changing_image" id="changing_image" value="{{$product->product_image}}">
        
        <div class="col-md-12" style="border-right: 1px solid #ddd;">
        <div id="change_product_image-preview"></div>
      </div>

       <div class="col-md-12">
        <input type="file"  name="change_product_upload_image" id="change_product_upload_image" accept="image/jpeg, image/png, image/gif," required >
        <button class="btn btn-success btn-block btn-lg" id="change_product_upload_crop_image">Upload</button>
        </div>
</div>

   
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="change_productimagedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
