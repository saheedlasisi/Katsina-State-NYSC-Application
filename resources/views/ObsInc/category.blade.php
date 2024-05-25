<!-- Modal -->
<div id="categoryModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;">Add Category</h4>

        <button type="button" id="categoryup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


        <form id="category_form" action="{{ URL::to('obs/addcategory') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="category_name" id="category_name" required >
        <label class="focus-label">Enter Category Name</label>

                      
          </div>

                     

                    
      <button type="submit" class="btn btn-success btn-block btn-lg login-btn">Register</button>
                    
                      
                 
                    </form>
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="categorydown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
