<!-- Modal -->
<div id="infoModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Create An Information</h4>

        <button type="button" id="infoup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form id="information_form" action="{{ URL::to('obs/storeinformation') }}" method="POST">
        {{ csrf_field() }}

          <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
  <label>Batch<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_batch" id="info_batch" required > 
  
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Stream<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_stream" id="info_stream" required > 
  <option value="1">1</option>
  <option value="2">2</option>

  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Year<span class="text-danger">*</span></label>
  <select class="form-control select" name="info_year" id="info_year" required > 
  
@foreach($useryears as $useryear)
<option value="{{$useryear->year}}">{{$useryear->year}}</option>
@endforeach
  </select>
  </div>
            </div>

          </div>
                      
         


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="info_title" id="info_title">
        <label class="focus-label">Enter Information Title</label>

                      
          </div>

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Contents <span class="text-danger">*</span></label>
  <textarea id="info_content" class="form-control service-desc" name="info_content"></textarea>
      </div>
    </div>
  </div>
</div> 


<div class="form-group">
  <label>Signature <span class="text-danger">*</span></label>
  <select class="form-control select" name="info_signature" id="info_signature"> 
  <option value="">Select Signature</option>
  <option value="obs">By Obs</option>
  <option value="management">By Management</option>
  </select>
  </div>                    

                    
<button type="submit" class="btn btn-success btn-block btn-lg login-btn">Create</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="infodown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
