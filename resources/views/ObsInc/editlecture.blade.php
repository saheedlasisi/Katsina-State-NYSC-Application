<!-- Modal -->
<div id="edit_lectureModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Edit Lecture</h4>

        <button type="button" id="edit_lectureup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form id="edit_lecture_form" action="{{ URL::to('obs/updatelecture') }}" method="POST">
        {{ csrf_field() }}

       
  <div class="form-group">
  <label>Lecture's Topic <span class="text-danger">*</span></label>
  <input class="form-control" type="text" name="edit_lecture_topic" id="edit_lecture_topic" placeholder="Enter Topic">
  <input type="hidden" name="edit_lecture_id" id="edit_lecture_id">
  </div>

  <div class="form-group">
  <label>Lecturer Name <span class="text-danger">*</span></label>
  <input class="form-control" type="text" name="edit_lecturer_name" id="edit_lecturer_name" placeholder="Enter Lecturer Name">
  </div>

  <div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Lecture's Content<span class="text-danger">*</span></label>
  <textarea id="edit_lecture_content" class="form-control service-desc" name="edit_lecture_content"></textarea>
      </div>
    </div>
  </div>
</div> 


<div class="form-group">
  <label>Status <span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_lecture_status" id="edit_lecture_status"> 
  <option value="">Select Status</option>
  <option value="active">Active</option>
  <option value="inactive">Inactive</option>
  </select>
  </div>  


           <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
  <label>Batch<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_lecture_batch" id="edit_lecture_batch" required > 
  
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Stream<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_lecture_stream" id="edit_lecture_stream" required > 
  <option value="1">1</option>
  <option value="2">2</option>

  </select>
  </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
  <label>Year<span class="text-danger">*</span></label>
  <select class="form-control select" name="edit_lecture_year" id="edit_lecture_year" required > 
  
@foreach($useryears as $useryear)
<option value="{{$useryear->year}}">{{$useryear->year}}</option>
@endforeach
  </select>
  </div>
            </div>

          </div>                

                    
<button type="submit" class="btn btn-success btn-block btn-lg login-btn">Update</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="edit_lecturedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
