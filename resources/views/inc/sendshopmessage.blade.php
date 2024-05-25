<!-- Modal -->
<div id="sendshopmessageModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Send Message</h4>

        <button type="button" id="sendshopmessageup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="send_shop_message_form" action="{{ route('user.addsendshopmessage') }}" method="POST">
        {{ csrf_field() }}


       <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="shop_message_name" id="shop_message_name" value="{{auth()->user()->name}}">
        <input type="hidden" name="shop_id" id="shop_id" value="{{$shop->shop_id}}">
        <label class="focus-label">Name</label>
        </div>

        <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="shop_message_email" id="shop_message_email" value="{{auth()->user()->email}}">
        <label class="focus-label">Email</label>
        </div>

        <div class="form-group form-focus">
        <input type="text" class="form-control floating" name="shop_message_subject" id="shop_message_subject">
        <label class="focus-label">Subject</label>
        </div>
        

        <div class="form-group">
          <label class="focus-label">Message</label>
        <textarea class="form-control" name="shop_message_content" id="shop_message_content" required ></textarea>
        
        </div>
        <div class="msg-typing" id="shop_message_process">
 please wait as your request has been on process.................... 
 <span></span>
  <span></span>
  <span></span>
  </div>
  <br>
  <hr>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="sendshopmessagedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
