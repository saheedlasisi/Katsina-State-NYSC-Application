<!-- Modal -->
<div id="replyquestionModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Reply</h4>

        <button type="button" id="replyquestionup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form>
        {{ csrf_field() }}

 

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        
  <label>Question <span class="text-danger">*</span></label>
<textarea class="form-control" id="saed_lecture_reply_question" name="saed_lecture_reply_question" readonly ></textarea>
      </div>
    </div>
  </div>
</div>


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <input type="hidden" name="saed_lecture_reply_id" id="saed_lecture_reply_id">
  <label>Reply <span class="text-danger">*</span></label>
<textarea class="form-control" id="saed_lecture_reply_content" name="saed_lecture_reply_content"></textarea>
      </div>
    </div>
  </div>
</div>



<button class="btn btn-success btn-block btn-lg login-btn" id="saed_lecture_reply_btn">Reply</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="replyquestiondown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
