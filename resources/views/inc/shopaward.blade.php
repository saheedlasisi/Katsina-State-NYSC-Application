<!-- Modal -->
<div id="shopawardModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Add Award</h4>

        <button type="button" id="shopawardup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="add_shopaward_form" action="{{ route('user.addshopaward') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="shopaward_name" id="shopaward_name" required >
        <label class="focus-label">Enter Award Name</label>
        </div>

        
        <input type="hidden" name="shopaward_shop_id" id="shopaward_shop_id" value="{{$shop->shop_id}}">
         <div class="form-group form-focus">
        <input type="date" class="form-control floating" name="shopaward_date" id="shopaward_date" required >
        <label class="focus-label">Enter Date</label>
        </div>

        <div class="form-group">
          <label class="focus-label">Enter Detail</label>
        <textarea class="form-control" name="shopaward_detail" id="shopaward_detail" required ></textarea>
        
        </div>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="shopawarddown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
