<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
  

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | Staff Reset Password</title>

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
  
  
  </head>
  <body>
<!-- Main Wrapper -->
    <div class="main-wrapper">
@include('StaffInc.login')

   


<!-- Page Content -->
      <div class="content">
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-md-8 offset-md-2">
              
              <!-- Login Tab Content -->
              <div class="account-content" >
                <div class="row align-items-center justify-content-center" >
                  <div class="col-md-7 col-lg-6 login-left" >
                    <img src="{{ asset('assets/img/forget3.png') }}" class="img-fluid" alt="Doccure Login"> 
                  </div>
                  <div class="col-md-12 col-lg-6 login-right" style="background: lightgreen; border-radius: 20px;">
                    <div class="login-header">
                      <h3 style="color: #fff;">Staff <span>Reset Password</span></h3>
                    </div>
                    @include('StaffInc.message')
                    <form action="{{ route('staff.password.request') }}" method="POST">
                      {{ csrf_field() }}
                       <input type="hidden" name="token" value="{{ $token }}">
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-focus">
                        <input type="email" class="form-control floating" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" required autofocus>
                        <label class="focus-label">Email</label>
                         @if ($errors->has('email'))
                            <span class="forgot-link">
                                <strong style="color: #000;">{{ $errors->first('email') }}</strong>
                              </span>
                        @endif

                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-focus">
                        <input type="password" class="form-control floating" name="password" id="password" placeholder="Enter Your Password" required >
                        <label class="focus-label">Password</label>

                        @if ($errors->has('password'))
                                    <span class="forgot-link">
                                        <strong style="color: #000;">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                      </div>


                      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-focus">
                        <input type="password" class="form-control floating" name="password_confirmation" id="password-confirm" placeholder="Password Again" required >
                        <label class="focus-label">Password Confirmation</label>

                        @if ($errors->has('password_confirmation'))
                                    <span class="forgot-link">
                                        <strong style="color: #000;">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                      </div>



                      
                      <div class="text-right">
                        <a class="forgot-link" href="{{route('staff.login')}}">Back to Login</a>
                      </div>
                      <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Reset Password</button>
                      
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
    
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    
    <!-- Slick JS -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
  </body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Jul 2020 15:00:21 GMT -->
</html>