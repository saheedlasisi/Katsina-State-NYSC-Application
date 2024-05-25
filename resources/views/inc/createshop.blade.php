<!-- Modal -->
<div id="createshopModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4>CREATE A SHOP</h4>

        <button type="button" id="createshopup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}


       <div class="form-group">
        <label>Shop Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_name" id="shop_name" placeholder="Enter the Shop Name [E.g, StarGlobal-Tech, MS Ideas Shoes]" required >
      
        </div>
        <div class="form-group">
        <label>Shop Address <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_address" id="shop_address" placeholder="Enter the Shop Address [E.g, Mani road, bayan gidan lema jubril]" required >
      
        </div>

         <div class="form-group">
        <label>Shop Phone Number <span class="text-danger">*</span></label>
        <input type="number" class="form-control floating" name="shop_phone_number" id="shop_phone_number" placeholder="Enter the Shop Phone Number [E.g, 08158337308]" value="{{auth()->user()->phone_number}}" required >
      
        </div>

         <div class="form-group">
        <label>Shop Email Address <span class="text-danger">*</span></label>
        <input type="email" class="form-control floating" name="shop_email" id="shop_email" placeholder="Enter the Shop Email Address [E.g, lasisisaheed5@gmail.com]" value="{{auth()->user()->email}}" required >
      
        </div>

         <div class="form-group">
        <label>Shop Specialization <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_specialist" id="shop_specialist" placeholder="Enter the Shop Specialization [E.g, Web design, shoe making, etc]" required >
      
        </div>

              <div class="form-group">
        <label>Shop Open Hour <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_open_hour" id="shop_open_hour" placeholder="Enter the Shop Open Hour [E.g, 10am, 5pm, etc]" required >
      
        </div>


              <div class="form-group">
        <label>Shop Closing Hour <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_closing_hour" id="shop_closing_hour" placeholder="Enter the Shop Closing Hour [E.g, 10pm, 5pm, etc]" required >
      
        </div>

               <div class="form-group">
        <label>Shop Working Days <span class="text-danger">*</span></label>
        <input type="text" class="form-control floating" name="shop_working_days" id="shop_working_days" placeholder="Enter the Shop Working Days [E.g, MON, TUE, WES, etc]" required >
      
        </div>


        <div class="form-group">
        <label>About Shop <span class="text-danger">*</span></label>
       <textarea class="form-control" name="about_shop" id="about_shop"></textarea>
      
        </div>

         <div class="row">

        
      <div class="col-md-12" style="border-right: 1px solid #ddd;">
        <label>Shop Image Preview <span class="text-danger">*</span></label>
        <div id="shop_image_preview"></div>
      </div>

       <div class="col-md-12">
        <label> Shop Image <span class="text-danger">*</span></label>
        <input type="file"  name="shop_image" id="shop_image" accept="image/jpeg, image/png, image/gif," required >
        </div>
      </div>

       
<div class="msg-typing" id="shop_create_process">
 processing...... wait <span></span>
  <span></span>
  <span></span>
  </div>
  <br>
   <button class="btn btn-success btn-block btn-lg" id="create_shop_btn">Create</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="createshopdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


    </div>
