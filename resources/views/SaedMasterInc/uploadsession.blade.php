<!-- Modal -->
<div id="uploadsessionModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Upload Session</h4>

        <button type="button" id="uploadsessionup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form>
        {{ csrf_field() }}

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Batch <span class="text-danger">*</span></label>
<select class="form-control" id="session_batch" name="session_batch">

  <option value="A">A</option>
    <option value="B">B</option>
      <option value="C">C</option>
</select>
      </div>
    </div>
  </div>
</div> 


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Stream <span class="text-danger">*</span></label>
<select class="form-control" id="session_stream" name="session_stream">

  <option value="1">1</option>
    <option value="2">2</option>
     
</select>
      </div>
    </div>
  </div>
</div>


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Year <span class="text-danger">*</span></label>
<select class="form-control" id="session_year" name="session_year">
  
  
    @if(count($useryears) > 0)

    @foreach($useryears as $year)
    <option value="{{$year->year}}">{{$year->year}}</option>

    @endforeach
    @else

    @endif
     
</select>
      </div>
    </div>
  </div>
</div>



<button class="btn btn-success btn-block btn-lg login-btn" id="session_upload_btn">Upload</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="changepassworddown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
