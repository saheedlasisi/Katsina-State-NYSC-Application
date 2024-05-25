<!-- Modal -->
<div id="update_categoryModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;">Edit Category</h4>

        <button type="button" id="update_categoryup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


        <form id="update_category_form" action="{{ URL::to('obs/updatecategory') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="update_category_name" id="update_category_name" required >
        <label class="focus-label">Edit Category Name</label>
        <input type="hidden" name="update_c_id" id="update_c_id">
                      
          </div>

                     

                    
      <button type="submit" class="btn btn-primary btn-block btn-lg login-btn">Update</button>
                    
                      
                 
                    </form>
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="update_categorydown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
