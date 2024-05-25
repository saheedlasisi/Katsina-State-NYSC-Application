<!-- Modal -->
<div id="lectureModal" class="modal" role="dialog" >
  <div class="modal-dialog" role="document">

    <!-- Modal content-->

    <div class="modal-content" >
      <div class="modal-header" style="background: lightgreen;" ><h4 id="lecture_modal_topic"> </h4>

        <button type="button" id="lectureup" class="close" data-dismiss="modal">&times;</button>

      </div>

      <div class="modal-body">


<!--###################################################################################### -->   
<!-- Page Content -->
  <!--     <div class="content">
        <div class="container"> -->
        
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="blog-view">
                <div class="blog blog-single-post">
                
                  <h6 class="blog-title" id="lecture_topic"> </h6>
                  <div class="blog-info clearfix">
                    <div class="post-left">
                      <ul>
                        <li>
                          <div class="post-author">
                            <a href="javascript:void(0)"> <i class="far fa-user"></i> <span id="lecturer_name"> </span></a>
                          </div>
                        </li>
                           <li><i class="far fa-eye"></i> <span id="lecture_view"> </span></li>
                        <li><i class="far fa-calendar"></i> <span id="lecture_date"> </span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="blog-content" id="lecture_content">
                   
                  </div>
                </div>
                
             
           
               <div class="card blog-comments clearfix">
                  <div class="card-header">
                    <h5 class="card-title" id="count_question"></h5>
                  </div>
                  <div class="card-body pb-0">
                  <ul class="comments-list" id="question_list">
                    
                   
                 
                  </ul>
                </div>
                </div>


                <div class="card new-comment clearfix">
                  <div class="card-header">
                    <h4 class="card-title">Ask Question</h4>
                  </div>
                  <div class="card-body">
            <form>
        {{ csrf_field() }}
                    
                     
                      <div class="form-group">
                        <input type="hidden" name="lecture_obs_id" id="lecture_obs_id">
                         <input type="hidden" name="lecture_id" id="lecture_id">
                        <label>Ask Question</label>
                        <textarea rows="4" class="form-control" name="lecture_question" id="lecture_question"></textarea>
                      </div>
                      <div class="submit-section">
                        <button class="btn btn-primary submit-btn" type="submit" id="add_question_btn">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
            
                
              </div>
              </div>
          
            
            
                </div>
       <!--  </div>

      </div> -->    
      <!-- /Page Content -->
<!-- ################################################################################### -->       
      

      </div>
      <div class="modal-footer" style="background: lightgreen; color: #000;">

        <button type="button" id="lecturedown" class="btn btn-secondary" data-dismiss="modal">Close</button>


      </div>
    </div>


  </div>
</div>


		</div>
