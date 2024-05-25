<!-- Modal -->
<div id="educationModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Add Education Backgound</h4>

        <button type="button" id="educationup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="add_education_form" action="{{ route('user.addeducation') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="school_name" id="school_name" required >
        <label class="focus-label">Enter School Name</label>
        </div>

        <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="degree_type" id="degree_type" required >
        <label class="focus-label">Enter Degree Type</label>
        </div>

        <div class="form-group form-focus">
        <input type="date" class="form-control floating" name="education_from_date" id="education_from_date" required >
        <label class="focus-label">Enter From Date</label>
        </div>
         <div class="form-group form-focus">
        <input type="date" class="form-control floating" name="education_to_date" id="education_to_date" required >
        <label class="focus-label">Ennter To Date</label>
        </div>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="educationdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
