<!-- Modal -->
<div id="change_shopimageModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Change Shop Image</h4>

        <button type="button" id="change_shopimageup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


      <div class="row">
        <input type="hidden" name="change_shop_image_id" id="change_shop_image_id" value="{{$shop->shop_id}}">
        <input type="hidden" name="changing_image" id="changing_image" value="{{$shop->shop_image}}">
        
        <div class="col-md-12" style="border-right: 1px solid #ddd;">
        <div id="change_shop_image-preview"></div>
      </div>

       <div class="col-md-12">
        <input type="file"  name="change_shop_upload_image" id="change_shop_upload_image" accept="image/jpeg, image/png, image/gif," required >
        <button class="btn btn-success btn-block btn-lg" id="change_shop_upload_crop_image">Upload</button>
        </div>
</div>

   
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="change_shopimagedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
