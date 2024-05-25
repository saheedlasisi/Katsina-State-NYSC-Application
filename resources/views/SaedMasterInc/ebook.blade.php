<!-- Modal -->
<div id="ebookModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4> Upload E-book</h4>

        <button type="button" id="ebookup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->

            <form id="upload_ebook_form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}


                     <div class="col-md-12">
            
            <div class="alert" id="message" style="display: none;"></div>
    <div class="form-group">
      <label>Book Title <span class="text-danger">*</span></label>
      <input type="text" name="ebook_title" id="ebook_title" placeholder="Enter Book Title" class="form-control">
    </div>
  </div>
<input type="hidden" name="session_ebook_id" id="session_ebook_id" value="{{$session->saed_session_id}}">
          <div class="col-md-12">
    <div class="form-group">
      <label>Upload Photos <span class="text-danger">*</span></label>
      <input type="file" name="ebook" id="ebook" accept="application/pdf," class="form-control">

    </div>
  </div>

          
          <div class="col-md-12">
            <div class="form-group">
      <input type="submit" id="upload_ebook_btn" name="upload_ebook_btn" class="btn btn-success btn-lg">

    </div>
  </div>
          
</form>
 <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="ebookdown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
