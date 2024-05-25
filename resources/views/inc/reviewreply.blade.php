<!-- Modal -->
<div id="reviewreplyModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Reply</h4>

        <button type="button" id="reviewreplyup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

         <form>
        {{ csrf_field() }}

    <div class="form-group">
          <label>Review Star</label>
          <select class="form-control" name="reviewreply_star" id="reviewreply_star">
            <option value="">Select Review Rating Star</option>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
          </select>
          <div class="rating" id="reviewreply_star_preview">
          
        </div>
        </div>
       <input type="hidden" name="review_reply_id" id="review_reply_id">
        <div class="form-group">
          <label class="focus-label">Enter Detail</label>
        <textarea class="form-control" name="reviewreply_content" id="reviewreply_content" required ></textarea>
        <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">Breaking Down</span> your review[i.e text] will make it comes out in a perfect way, Thank you.</small></div>
                        
        <hr>
        </div>

   <button class="btn btn-success btn-block btn-lg" id="add_reviewreply_btn">Reply</button>
                    
                      
                 
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="reviewreplydown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
