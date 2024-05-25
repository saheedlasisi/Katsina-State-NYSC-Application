<!-- Modal -->
<div id="createproductModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4>CREATE A PRODUCT</h4>

        <button type="button" id="createproductup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


       <div class="form-group">
        <input type="hidden" name="product_shop_id" id="product_shop_id">
        <label>Product Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="product_name" id="product_name" placeholder="Enter the Product Name [E.g, ]" required >
      
        </div>
        

         <div class="form-group">
        <label>Product Price <span class="text-danger">*</span></label>
        <input type="number" class="form-control floating" name="product_price" id="product_price" placeholder="Enter the Product Price [E.g, 3000]" required >
      
        </div>

         <div class="form-group">
        <label>Product Old Price <span class="text-danger">*</span></label>
        <input type="number" class="form-control floating" name="product_old_price" id="product_old_price" placeholder="Enter the Product Old Price [E.g, 2000]" required >
      
        </div>

        <div class="form-group">
        <label>Product Stock <span class="text-danger">*</span></label>
        <input type="number" class="form-control floating" name="product_qty" id="product_qty" placeholder="Enter the Product Stock [E.g, 12]" required >
      
        </div>

         

        <div class="form-group">
        <label>Product Description <span class="text-danger">*</span></label>
       <textarea class="form-control" name="product_description" id="product_description"></textarea>
      
        </div>

         <div class="row">

        
      <div class="col-md-12" style="border-right: 1px solid #ddd;">
        <label>Product Image Preview <span class="text-danger">*</span></label>
        <div id="product_image_preview"></div>
      </div>

       <div class="col-md-12">
        <label> Product Image <span class="text-danger">*</span></label>
        <input type="file"  name="product_image" id="product_image" accept="image/jpeg, image/png, image/gif," required >
        </div>
      </div>

       
<div class="msg-typing" id="product_create_process">
 processing...... wait <span></span>
  <span></span>
  <span></span>
  </div>
  <br>
   <button class="btn btn-success btn-block btn-lg" id="create_product_submit_btn">Create</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="createproductdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


    </div>
