@extends('layouts.app')
@section('content')


<!-- Breadcrumb -->
			<div class="breadcrumb-bar" style="background: lightgreen;">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">saed</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">SAED</h2>
						</div>


						<!-- <div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div> -->




					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->




<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<label>Search</label>
									<input type="text" class="form-control" id="search_saed_name" placeholder="Saed Title">
								</div>
								
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<!-- Doctor Widget -->
							<input type="hidden" name="" id="my_batch" value="{{auth()->user()->batch}}">
							<div class="row row-grid" id="session_list">
								
							
								
							
					
								
							</div>
							
							<!-- /Doctor Widget -->

							

							
						</div>


					</div>

				</div>

			</div>		
			<!-- /Page Content -->


<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
var _tokens = $('input[name=_token]').val();

		
getSaed();
	function getSaed(saed_name=""){


		$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},        
        url:"{{route('user.fetchsession')}}",
        method:"POST",
        data:{saed_name:saed_name,_tokens:_tokens},
        success:function(data){

        console.log(data)

$('#session_list').empty();
        if (data == '') {
$('#session_list').empty();
          var session_list = '<center><h6>NO RECORD FOUND</h6></center>';

    $('#session_list').append(session_list);

        }else{

             $('#session_list').empty();
     $.each(data, function(i, value){

 var session_list = '<div class="col-md-6 col-lg-4 col-xl-3"><div class="card widget-profile pat-widget-profile"><div class="card-body"><div class="pro-widget-content"><div class="profile-info-widget"><a href="/assets/img/saedimage/'+value.image+'" class="booking-doc-img"><img src="/assets/img/saedimage/'+value.image+'" alt="User Image"></a><div class="profile-det-info"><h3><a href="/saed/'+value.saed_title+'/'+value.saed_session_id+'">'+value.saed_title+'</a></h3><div class="patient-details"><h5 class="mb-1"><b>Saed ID :</b> '+value.saed_id+'</h5><h5 class="mb-1"><b>Session ID :</b> '+value.session_id+'</h5><h5 class="mb-0"><i class="fas fa-home"></i> '+value.session_year+', Batch: '+value.session_batch+', Stream: '+value.session_stream+' </h5></div></div></div></div><div class="patient-info"><ul><li><i class="fa fa-users" style="color: lightgreen; font-size: 30px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ('+value.member+') <span><a href="/saed/'+value.saed_title+'/'+value.saed_session_id+'" class="btn btn-success btn-sm">view</a></span></li></ul></div></div></div></div>';

    $('#session_list').append(session_list);



      });


        }


      
        
            
        }


    })

	}




$("#search_saed_name").keyup(function(){
    var search_saed_name = $(this).val();
    getSaed(search_saed_name);

 });



$("#search_saed_name").bind("change keyup", function(event){
    var search_saed_name = $(this).val();
   getSaed(search_saed_name);

 });






	});
</script>






@include('inc.createshop')
@endsection
