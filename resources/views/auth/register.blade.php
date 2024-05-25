<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
  

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | Corper's Registration</title>

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicons -->
    <link type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  
  </head>
  <body>
<!-- Main Wrapper -->
    <div class="main-wrapper">
@include('inc.login')

   






<!-- Page Content -->
      <div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-8 offset-md-2">
              
              <!-- Login Tab Content -->
              <div class="account-content">
                <div class="row align-items-center justify-content-center">
                  <div class="col-md-7 col-lg-6 login-left">
                    <img src="assets/img/register2.jpg" class="img-fluid" alt="Corper's Login"> 
                  </div>
                  <div class="col-md-12 col-lg-6 login-right shadow" style="background: lightgreen; border-radius: 15px; margin-bottom: 20px;">
                    <div class="login-header">
                      <h3>Corper's <span>Registration</span></h3>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                      {{ csrf_field() }}


                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-focus">
                        <input type="name" class="form-control floating" name="name" id="name" value="{{ old('name') }}" placeholder="E.g Lasisi Saheed" required autofocus >
                        <label class="focus-label">Full Name</label>

                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-focus">
                        <input type="email" class="form-control floating" name="email" id="email" value="{{ old('email') }}" required autofocus >
                        <label class="focus-label">Email</label>

                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-focus">
                        <input type="password" class="form-control floating" name="password" id="password" required >
                        <label class="focus-label">Password</label>

                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>

                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-focus">
                        <input type="password" class="form-control floating" name="password_confirmation" id="password-confirm" required >
                        <label class="focus-label">Confirm Password</label>

                        @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                      </div>


                      <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }} form-focus">
                        <input type="number" class="form-control floating" name="phone_number" id="phone_number" required >
                        <label class="focus-label">Phone Number</label>

                        @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                      </div>


                      <div class="form-group ">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control" name="batch" id="batch" required >
                             <option value="">Batch</option>
                             <option value="A">A</option>
                             <option value="B">B</option>
                             <option value="C">C</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" name="stream" id="stream" required >
                             <option value="">Stream</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" name="year" id="year" required >
                            
                          </select>
                        
                        </div>


                       </div>
                      </div>

                      <div class="form-group ">
                       <div class="row">
                         

                        <div class="col-md-4">
                        
                         <select class="form-control" name="gender" id="gender" required >
                             <option value="">Sex</option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                          </select>
                        
                        </div>

                        <div class="col-md-4">
                        
                         <select class="form-control" name="religion" id="religion" required >
                             <option value="">Religion</option>
                             <option value="Muslim">Muslim</option>
                             <option value="Christian">Christian</option>
                          </select>
                        
                        </div>

                          <div class="col-md-4">
                        
                         <select class="form-control" name="state_of_origin" id="state_of_origin" required >
                            
                             
                          </select>
                        
                        </div>

                        


                       </div>
                      </div>



                      
                      <button class="btn btn-primary btn-block btn-lg login-btn registrationConfirmation" type="submit" >Register</button>
                      <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or" style="color: #000;">or</span>
                      </div>
                      
                      <div class="text-center dont-have">you have an account? <a href="/login" style="color: #fff;">Login</a></div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /Login Tab Content -->
                
            </div>
          </div>

        </div>

      </div>    
      <!-- /Page Content -->






@include('MainInc.footer')

         </div>
     <!-- /Main Wrapper -->
              <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <!-- Slick JS -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script type="text/javascript">
      
      $(document).ready(function(){

var _tokens = $('input[name=_token]').val();

  //Registration Confirmation
  

  var registration = document.getElementsByClassName('registrationConfirmation');
    var confirmItregistration = function (e) {
        if (!confirm('Are you sure you have filled in correct information, choose correct gender as it will be use to allocate hostel for you in the camp.')) e.preventDefault();
    };
    for (var i = 0, l = registration.length; i < l; i++) {
        registration[i].addEventListener('click', confirmItregistration, false);
    }  



    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "/getyear",
    data:{_tokens:_tokens},
    success: function(data){

    var year_empty = '<option value="">Select Year</option>';
    
     
   
    $('#year').empty();
     $('#year').append(year_empty);
$.each(data, function(i, value){
var years = '<option value="'+value.year+'">'+value.year+'</option>';
$('#year').append(years);

});

    }


  }); 
       



//Geting States
GetStates();

function GetStates(){

  $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "/getstates",
    data:{_tokens:_tokens},
    success: function(data){

    var state_empty = '<option value="">State of origin</option>';
    
     
   
    $('#state_of_origin').empty();
     $('#state_of_origin').append(state_empty);
$.each(data, function(i, value){
var states_reg = '<option value="'+value.state_id+'">'+value.state+'</option>';
$('#state_of_origin').append(states_reg);

});

    }


  })  


}




  $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    type: 'POST',
    url: "/getadmindetails",
    data:{_tokens:_tokens},
    success: function(data){

      //console.log(data);

     $('#batch').val(data.batch);
      $('#stream').val(data.stream);
      $('#year').val(data.year);


    } 

});



  



    


});
    </script>
    
  </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jul 2020 15:00:21 GMT -->
</html>