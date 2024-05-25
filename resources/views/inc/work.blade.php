<!-- Modal -->
<div id="workModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Add Work Exprience</h4>

        <button type="button" id="workup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="add_work_form" action="{{ route('user.addwork') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="w_title" id="w_title" required >
        <label class="focus-label">Enter Work Exprience Title</label>
        </div>


        <div class="form-group form-focus">
        <input type="date" class="form-control floating" name="w_from_date" id="w_from_date" required >
        <label class="focus-label">Enter From Date</label>
        </div>
         <div class="form-group form-focus">
        <input type="date" class="form-control floating" name="w_to_date" id="w_to_date" required >
        <label class="focus-label">Ennter To Date</label>
        </div>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="workdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
