<!-- Modal -->
<div id="obsModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: #00CCFF; color: #000;">
  <h4 class="modal-title" style="color: #fff;">Registration</h4>

        <button type="button" id="obsup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


        <form>
                      {{ csrf_field() }}


        <div class="form-group ">
                <p><label> Name</label>  </p>      
       <input type="text" name="staff_name" id="staff_name" class="form-control">
                        
        </div>

           <div class="form-group ">
                <p><label> Email</label>  </p>      
       <input type="email" name="staff_email" id="staff_email" class="form-control">
                        
        </div>
           <div class="form-group ">
                <p><label> Phone Number</label>  </p>      
       <input type="number" name="staff_phone_number" id="staff_phone_number" class="form-control">
                        
        </div>
           <div class="form-group ">
                <p><label> Position</label>  </p>      
     <select name="staff_position" id="staff_position" class="form-control">
       <option value="PRO">PRO</option>
       <option value="ZI">ZI</option>
       <option value="LGI">LGI</option>
       <option value="ICT DIRECTOR">ICT DIRECTOR</option>
       <option value="ACCOUNTANT">ACCOUNTANT</option>

     </select>              
        </div>



              <div class="form-group ">
                <p><label> Password</label>  </p>      
       <input type="password" name="staff_password" id="staff_password" class="form-control">
                        
        </div>


              <div class="form-group ">
                <p><label> Password Again</label>  </p>      
       <input type="password" name="staff_password_again" id="staff_password_again" class="form-control">
                        
        </div>

                     

              <h6 id="wait_obs"><i> Wait as the registration has been on process....</i></h6>        
      <button class="btn btn-primary btn-block btn-lg login-btn" id="reg_staff_btn">Register</button>
                    
                      
                 
                    </form>
      

      </div>
      <div class="modal-footer" style="background: #00CCFF; color: #000;">

        <button type="button" id="obsdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
