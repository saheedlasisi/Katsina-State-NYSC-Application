<!-- Modal -->
<div id="edit_infoModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Edit Information</h4>

        <button type="button" id="edit_infoup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form id="edit_information_form" action="{{ URL::to('obs/updateinformation') }}" method="POST">
        {{ csrf_field() }}

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
  <label>Batch<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_info_batch" id="edit_info_batch" required > 
  
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Stream<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_info_stream" id="edit_info_stream" required > 
  
<option value="1">1</option>
  <option value="2">2</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Year<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_info_year" id="edit_info_year" required > 
  
@foreach($useryears as $useryear)
<option value="{{$useryear->year}}">{{$useryear->year}}</option>
@endforeach
  </select>
  </div>
            </div>

          </div>
                      
         


       <div class="form-group">
        <input type="text" class="form-control floating" name="edit_info_title" id="edit_info_title">
      
        <input type="hidden" name="edit_info_id" id="edit_info_id">
                      
          </div>

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Contents <span class="text-danger">*</span></label>
  <textarea id="edit_info_content" class="form-control service-desc" name="edit_info_content"></textarea>
      </div>
    </div>
  </div>
</div> 


 

  <div class="row">
    <div class="col-md-6"><div class="form-group">
  <label>Signature <span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_info_signature" id="edit_info_signature"> 
  <option value="">Select Signature</option>
  <option value="obs">By Obs</option>
  <option value="management">By Management</option>
  </select>
  </div></div>
     <div class="col-md-6"><div class="form-group">
  <label>Status <span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_info_status" id="edit_info_status"> 
  <option value="">Select Status</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
  </select>
  </div></div>
  </div>                   

                    
<button type="submit" class="btn btn-success btn-block btn-lg login-btn">Update</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="edit_infodown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
