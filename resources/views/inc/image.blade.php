<!-- Modal -->
<div id="change_imageModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Change Profile Picture</h4>

        <button type="button" id="change_imageup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


      <div class="row">

        
        <div class="col-md-12" style="border-right: 1px solid #ddd;">
        <div id="image-preview"></div>
      </div>

       <div class="col-md-12">
        <input type="file"  name="upload_image" id="upload_image" accept="image/jpeg, image/png, image/gif," required >
        <button class="btn btn-success btn-block btn-lg" id="upload_crop_image">Upload</button>
        </div>
</div>

   
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="change_imagedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
