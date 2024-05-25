@extends('StaffLayouts.app')
@include('StaffInc.allocate')
@section('content')

	<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{route('staff.dashboard')}}">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Hostel Allocation</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Hostel Allocation</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->


<!-- <div class="container-fluid"> -->

									<div class="card">
										<div class="card-header">
											<h4 class="card-title">Record</h4>
											<a href="javascript:void(0);" class="btn btn-success float-right" id="allocate" >++ Allocate</a>
										</div>
										<div class="card-body">
											<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
												<li class="nav-item"><a class="nav-link active" href="#solid-rounded-justified-tab1" data-toggle="tab">Males Hostel</a></li>
												<li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab2" data-toggle="tab">Females Hosel</a></li>
												<li class="nav-item"><a class="nav-link" href="#solid-rounded-justified-tab3" data-toggle="tab">Analysis</a></li>
											</ul>
					<div class="tab-content">
					<div class="tab-pane show active" id="solid-rounded-justified-tab1">
												

<div class="container">
<p style="font-size: 20px;">Filter <small>with: <button class="btn btn-danger btn-sm" id="male_close_btn">Close</button></small></p>
  <div class="form-group" id="button_filter">
                    
                    <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="male_block_btn" >
                        Block
                      </label>
                    </div>

                    <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="male_block_and_room_btn">
                        Block && Room
                      </label>
                    </div>


                     <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="male_manual_btn" >
                        Manual
                      </label>
                    </div>

                     
                    
                  </div>
  
					</div>

					   <div class="form-group" id="male_block_filter_div">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control" id="male_block_filter">
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <button class="btn btn-success" id="male_block_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="male_refresh_btn">Refresh</button>
                        
                        </div>

                        


                       </div>
                      </div>

                      <div class="form-group" id="male_block_and_room_filter_div">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control"  id="male_block_and_room_block" required >
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                             <option value="G">G</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" id="male_block_and_room_room" required >
                             <option value="">Room</option>
                             <option value="1">1</option>
                             <option value="2">2</option>  
                             <option value="3">3</option>
                               <option value="4">4</option>
                                 <option value="5">5</option>
                                   <option value="6">6</option>
                                     <option value="7">7</option>
                          </select>
                        
                        </div>

                         <div class="col-md-4">
                        
                         <button class="btn btn-success" id="male_block_and_room_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="male_refresh_btn">Refresh</button>
                        
                        </div>
                      

                       </div>
                      </div>


                       <div class="form-group" id="male_manual_filter_div">
                       <div class="row">
                         
                         <div class="col-md-2">
                        
                         <select class="form-control" id="male_manual_block" required >
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                             <option value="G">G</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="male_manual_room" required >
                             <option value="">Room</option>
                             <option value="1">1</option>
                             <option value="2">2</option>  
                             <option value="3">3</option>
                               <option value="4">4</option>
                                 <option value="5">5</option>
                                   <option value="6">6</option>
                                     <option value="7">7</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="male_manual_batch" required >
                             <option value="">Batch</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="male_manual_stream" required >
                             <option value="">Stream</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="male_manual_year" required >
                             <option value="">Year</option>
                             <option value="2020">2020</option>
                             <option value="2021">2022</option>
                             <option value="2023">2023</option>
                              <option value="2024">2024</option>
                          </select>
                        
                        </div>
                        <div class="col-md-2">
                        
                         <button class="btn btn-success" id="male_manual_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="male_refresh_btn">Refresh</button>
                        
                        </div>

                       </div>
                      </div>

                      
							

						<div class="card card-table mb-0">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-center mb-0">

						<thead>
							<tr>
								<th>#</th>
								<th>Block</th>
								<th>Room</th>
								<th>Name</th>
								<th>State code/No</th>
								<th>Batch</th>
								<th>Stream</th>
								<th>Year</th>
								<th></th>
								
							</tr>
						</thead>

						<tbody id="male_allocation_table">
							
						</tbody>
					</table>
					</div>
					</div>	
					</div>				






				</div>
				<div class="tab-pane" id="solid-rounded-justified-tab2">

					
		<!-- 	Female side -->		

		<div class="container">
  <p style="font-size: 20px;">Filter <small>with: <button class="btn btn-danger btn-sm" id="female_close_btn">Close</button></small></p>
  <div class="form-group" id="button_filter">
                    
                    <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="female_block_btn" >
                        Block
                      </label>
                    </div>

                    <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="female_block_and_room_btn">
                        Block && Room
                      </label>
                    </div>


                     <div class="form-check" style="margin-right: 10px;">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="female_manual_btn" >
                        Manual
                      </label>
                    </div>

                     
                    
                  </div>
  
					</div>
                      
					

					   <div class="form-group" id="female_block_filter_div">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control" id="female_block_filter">
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <button class="btn btn-success" id="female_block_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="female_refresh_btn">Refresh</button>
                        
                        </div>

                        


                       </div>
                      </div>

                      <div class="form-group" id="female_block_and_room_filter_div">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control"  id="female_block_and_room_block" required >
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                             <option value="G">G</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" id="female_block_and_room_room" required >
                             <option value="">Room</option>
                             <option value="1">1</option>
                             <option value="2">2</option>  
                             <option value="3">3</option>
                               <option value="4">4</option>
                                 <option value="5">5</option>
                                   <option value="6">6</option>
                                     <option value="7">7</option>
                          </select>
                        
                        </div>

                         <div class="col-md-4">
                        
                         <button class="btn btn-success" id="female_block_and_room_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="female_refresh_btn">Refresh</button>
                        
                        </div>
                      

                       </div>
                      </div>


                       <div class="form-group" id="female_manual_filter_div">
                       <div class="row">
                         
                         <div class="col-md-2">
                        
                         <select class="form-control" id="female_manual_block" required >
                             <option value="">Block</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                             <option value="D">D</option>
                             <option value="E">E</option>
                             <option value="F">F</option>
                             <option value="G">G</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="female_manual_room" required >
                             <option value="">Room</option>
                             <option value="1">1</option>
                             <option value="2">2</option>  
                             <option value="3">3</option>
                               <option value="4">4</option>
                                 <option value="5">5</option>
                                   <option value="6">6</option>
                                     <option value="7">7</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="female_manual_batch" required >
                             <option value="">Batch</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="female_manual_stream" required >
                             <option value="">Stream</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                          </select>
                        
                        </div>

                        <div class="col-md-2">
                        
                         <select class="form-control"  id="female_manual_year" required >
                             <option value="">Year</option>
                             <option value="2020">2020</option>
                             <option value="2021">2022</option>
                             <option value="2023">2023</option>
                              <option value="2024">2024</option>
                          </select>
                        
                        </div>
                        <div class="col-md-2">
                        
                         <button class="btn btn-success" id="female_manual_proccess_btn">Process</button>
                        <button class="btn btn-default btn-light" id="female_refresh_btn">Refresh</button>
                        
                        </div>

                       </div>
                      </div>

				
						<div class="card card-table mb-0">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover table-center mb-0">

						<thead>
							<tr>
								<th>#</th>
								<th>Block</th>
								<th>Room</th>
								<th>Name</th>
								<th>State code/No</th>
								<th>Batch</th>
								<th>Stream</th>
								<th>Year</th>
								<th></th>
								
							</tr>
						</thead>

						<tbody id="female_allocation_table">
							
						</tbody>
					</table>
					</div>
					</div>	
					</div>






				</div>
				<div class="tab-pane" id="solid-rounded-justified-tab3">
													Tab content 3
												</div>
											</div>
										</div>
									</div>

									<!-- </div> -->




@endsection