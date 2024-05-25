<!-- Modal -->
<div id="replyshopmessageModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Send Message</h4>

        <button type="button" id="replyshopmessageup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form id="reply_shop_message_form" action="{{ route('user.replyshopmessage') }}" method="POST">
        {{ csrf_field() }}


        <div class="form-group">
          <label class="focus-label">Subject</label>
           <input type="hidden" name="reply_shop_id" id="reply_shop_id" value="{{$shop->shop_id}}">

           <input type="hidden" name="reply_shop_message_name" id="reply_shop_message_name">

          <input type="hidden"  name="reply_shop_message_email" id="reply_shop_message_email">

        <input type="text"  class="form-control" name="reply_shop_message_subject" id="reply_shop_message_subject">
        
        </div>
        

        <div class="form-group">
          <label class="focus-label">Message</label>
        <textarea class="form-control" name="reply_shop_message_content" id="reply_shop_message_content" required ></textarea>
        
        </div>
        <div class="msg-typing" id="reply_shop_message_process">
 please wait as your request has been on process.................... 
 <span></span>
  <span></span>
  <span></span>
  </div>

  <hr>

   <button type="submit" class="btn btn-success btn-block btn-lg">Submit</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="replyshopmessagedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
