<!-- Modal -->
<div id="replyquestionModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Edit An Information</h4>

        <button type="button" id="replyquestionup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form id="reply_lecture_question_form" action="{{ URL::to('obs/replylecturequestion') }}" method="POST">
        {{ csrf_field() }}

        <input type="hidden" name="q_id" id="q_id">

  <div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Reply<span class="text-danger">*</span></label>
  <textarea id="reply_question_content" class="form-control service-desc" name="reply_question_content"></textarea>
      </div>
    </div>
  </div>
</div> 


<div class="form-group">
  <label>Question Status <span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_q_status" id="edit_q_status"> 
  <option value="">Select Status</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
  </select>
  </div>                  

                    
<button type="submit" class="btn btn-success btn-block btn-lg login-btn">Reply</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="replyquestiondown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
