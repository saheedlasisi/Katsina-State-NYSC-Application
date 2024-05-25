<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
  

<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <title>{{ config('app.name', 'KatsinaStateNysc') }} | Corper's Login</title>

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
                    <img src="assets/img/login1.png" class="img-fluid" alt="Corper's Login"> 
                  </div>
                  <div class="col-md-12 col-lg-6 login-right shadow" style="background: lightgreen; border-radius: 15px; margin-bottom: 20px;">
                    <div class="login-header">
                      <h3>Corper's <span>Login</span></h3>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                      {{ csrf_field() }}

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


                      <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>


                      <div class="text-right">
                        <a class="forgot-link" href="{{ route('password.request') }}">Forgot Password ?</a>
                      </div>
                      <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                      <div class="login-or">
                        <span class="or-line"></span>
                        <span class="span-or" style="color: #000;">or</span>
                      </div>
                      
                      <div class="text-center dont-have">Don’t have an account? <a href="/register" style="color: #fff;">Register</a></div>
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