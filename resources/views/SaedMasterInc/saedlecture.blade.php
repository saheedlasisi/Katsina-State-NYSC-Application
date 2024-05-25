<!-- Modal -->
<div id="saedlectureModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Upload Lecture</h4>

        <button type="button" id="saedlectureup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form>
        {{ csrf_field() }}

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Title <span class="text-danger">*</span></label>
<input type="text" name="saed_lecture_title" id="saed_lecture_title" class="form-control" placeholder="Title">
      </div>
    </div>
  </div>
</div> 


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Content <span class="text-danger">*</span></label>
<textarea class="form-control" id="saed_lecture_content" name="saed_lecture_content"></textarea>
      </div>
    </div>
  </div>
</div>



<button class="btn btn-success btn-block btn-lg login-btn" id="saed_lecture_upload_btn">Upload</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="saedlecturedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
