<!-- Modal -->
<div id="allocateModal" class="modal" role="dialog">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #000;">
  <h4 class="modal-title" style="color: #000;">Hostel Allocation System</h4>

        <button type="button" id="allocateup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


        <form>
                      {{ csrf_field() }}


                      <div class="form-group ">
                        
                      <select class="form-control" name="allocate_user_id" id="allocate_user_id" required >
                            
                          </select>
                        
                      </div>

                     

                      <div class="form-group ">
                       <div class="row">
                         

                        <div class="col-md-6">
                        
                         <select class="form-control" name="allocate_block" id="allocate_block" required >
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                             <option value="G">G</option>
                          </select>
                        
                        </div>

                        <div class="col-md-6">
                        
                         <select class="form-control" name="allocate_room" id="allocate_room" required >
                             <option value="">Room</option>
                             <option value="1">1</option>
                             <option value="2">2</option>  
                             <option value="3">3</option>
                               <option value="4">4</option>
                                 <option value="5">5</option>
                                   <option value="6">6</option>
                                     <option value="7">7</option>
                          </select>
                        
                        </div>

                      

                       </div>
                      </div>



                      <div class="form-group ">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control" name="allocate_batch" id="allocate_batch" required >
                             <option value="">Batch</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" name="allocate_stream" id="allocate_stream" required >
                             <option value="">Stream</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" name="allocate_year" id="allocate_year" required >
                             <option value="">Year</option>
                             <option value="2020">2020</option>
                             <option value="2021">2022</option>
                             <option value="2023">2023</option>
                          </select>
                        
                        </div>


                       </div>
                      </div>

                      
      <button class="btn btn-primary btn-block btn-lg login-btn" id="allocate_btn">Allocate</button>
                    
                      
                 
                    </form>
      

      </div>
      <div class="modal-footer" style="background: darkgreen; color: #000;">

        <button type="button" id="allocatedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
