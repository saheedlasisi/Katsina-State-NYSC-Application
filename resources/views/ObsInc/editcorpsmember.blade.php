<!-- Modal -->
<div id="editcorpsmemberModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;">Update CorpsMember</h4>

        <button type="button" id="editcorpsmemberup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


        <form>
        {{ csrf_field() }}

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
  <label>Name <span class="text-danger">*</span></label>
  <input class="form-control" type="text" name="corps_name" id="corps_name" >
  </div>
  </div>



  <div class="col-lg-6">
    <div class="form-group">
  <label>State Code <span class="text-danger">*</span></label>
  <input class="form-control" type="text" name="corps_state_code" id="corps_state_code" >
  </div>
  </div>


    <div class="col-lg-4">
    <div class="form-group">
  <label>Account Status <span class="text-danger">*</span></label>
  <select class="form-control" name="corps_account_status" id="corps_account_status">
    <option value="verified">Verify</option>
    <option value="inactive">Inactive</option>
  </select>
  </div>
  </div>


   <div class="col-lg-8">
    <div class="form-group">
  <label>Email <span class="text-danger">*</span></label>
  <input class="form-control" type="text" name="corps_email" id="corps_email" >
  </div>
  </div>

  </div>
</div>

          <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
  <label>Batch<span class="text-danger">*</span></label>
  <select class="form-control select" name="corps_batch" id="corps_batch" required > 
  
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Stream<span class="text-danger">*</span></label>
  <select class="form-control select" name="corps_stream" id="corps_stream" required > 
  
<option value="1">1</option>
<option value="2">2</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Year<span class="text-danger">*</span></label>
  <select class="form-control select" name="corps_year" id="corps_year" required > 
  
@foreach($years as $year)

<option value="{{$year->year}}">{{$year->year}}</option>

@endforeach
  </select>
  </div>
      </div>

          </div>


      <input type="hidden" name="corps_id" id="corps_id">               

                    
      <button class="btn btn-primary btn-block btn-lg login-btn" id="update_corpsmember_btn">Update</button>
                    
                      
                 
                    </form>
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="editcorpsmemberdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
