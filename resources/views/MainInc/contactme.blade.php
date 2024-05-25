<!-- Modal -->
<div id="contactmeModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Send Message</h4>

        <button type="button" id="contactmeup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="contactme_form" action="/contactme" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="sender_name" id="sender_name" required >
        <label class="focus-label">Name</label>
        </div>

        <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="sender_email" id="sender_email" required >
        <label class="focus-label">Email</label>
        </div>

        <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="sender_subject" id="sender_subject" required >
        <label class="focus-label">Subject</label>
        </div>
        

        <div class="form-group">
          <label class="focus-label">Message</label>
        <textarea class="form-control" name="sender_message" id="sender_message" required ></textarea>
        
        </div>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="contactmedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
