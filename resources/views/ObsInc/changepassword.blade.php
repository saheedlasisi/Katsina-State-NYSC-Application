<!-- Modal -->
<div id="changepasswordModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Change Password</h4>

        <button type="button" id="changepasswordup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form>
        {{ csrf_field() }}

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Password <span class="text-danger">*</span></label>
<input type="password" class="form-control" name="edit_password" id="edit_password" placeholder="Password">
      </div>
    </div>
  </div>
</div> 


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Password Again <span class="text-danger">*</span></label>
<input type="password" class="form-control" name="edit_password_again" id="edit_password_again" placeholder="Password Again">
      </div>
    </div>
  </div>
</div>



<button class="btn btn-success btn-block btn-lg login-btn" id="update_password_btn">Change Password</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="changepassworddown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
