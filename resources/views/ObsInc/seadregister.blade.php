<!-- Modal -->
<div id="saedModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen; color: #fff; font-weight: 500;">Create An Information</h4>

        <button type="button" id="saedup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


    <form id="saed_form" action="{{ URL::to('obs/storesaedmaster') }}" method="POST">
        {{ csrf_field() }}

<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Name <span class="text-danger">*</span></label>
<input type="text" class="form-control" name="saed_name" id="saed_name">
      </div>
    </div>
  </div>
</div> 


<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
  <label>Email <span class="text-danger">*</span></label>
<input type="email" class="form-control" name="saed_email" id="saed_email">
      </div>
    </div>
  </div>
</div>




<div class="service-fields mb-3">
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
  <label>State Of Origin <span class="text-danger">*</span></label>
<select id="saed_origin" name="saed_origin" class="form-control">
  <option value="">Select</option>
  @foreach($states as $state)
<option value="{{$state->state}}">{{$state->state}}</option>
  @endforeach
</select>
      </div>
    </div>


 <div class="col-lg-6">
         <div class="form-group">
  <label>Katsina Base (LGA) <span class="text-danger">*</span></label>
<select id="saed_lga" name="saed_lga" class="form-control">
  <option value="">Select</option>
  @foreach($lgas as $lga)
<option value="{{$lga->lga_name}}">{{$lga->lga_name}}</option>
  @endforeach
</select>
      </div>
    </div>


  </div>
</div>



<button type="submit" class="btn btn-success btn-block btn-lg login-btn">Register</button>
                    
                      
</form>
      

</div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="saeddown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
