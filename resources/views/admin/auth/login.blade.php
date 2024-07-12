
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>Oxyy - Login and Register Form Html Template</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/style/css') }}" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100"> 
      
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6 col-lg-7 bg-light">
        <div class="hero-wrap d-flex align-items-center h-100">
          
          <div class="hero-mask opacity-8"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('../../../assets/images/login-bg-7.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="container">
              <div class="row g-0 mt-5">
                <div class="col-11 col-md-10 col-lg-9 mx-auto">
                  <h1 class="text-13 text-white fw-600 mb-4">To keep connected with largest shop in the world.</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Login Form
      ========================= -->
      <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
        <div class="container pt-4">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <div class="logo"> 
                <a class="fw-600 text-6 text-dark link-underline link-underline-opacity-0" href="index.html" title="Oxyy">Toko</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-12 mb-4">Sign In</h3>
              <form id="loginForm" method="POST" action="{{ route('admin.login') }}">
                        @csrf
                <label class="form-label fw-500" for="emailAddress">Email Address</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="email" class="form-control bg-light border-light" id="emailAddress" name="email" required placeholder="Email or Username">
                  <span class="icon-inside text-muted"><i class="fas fa-envelope"></i></span>
				</div>
                <label class="form-label fw-500" for="loginPassword">Password</label>
                <div class="mb-3 icon-group icon-group-end">
                  <input type="password" class="form-control form-control-lg bg-light border-light" id="loginPassword" name="password" required placeholder="Password">
                  <span class="icon-inside text-muted"><i class="fas fa-lock"></i></span>
				</div>
               
                <div class="d-grid my-4">
                  <button class="btn btn-dark btn-lg" type="submit">Sign In</button>
                </div>
              
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End --> 
      
    </div>
  </div>
</div>



<!-- Script --> 
<script src="{{ asset('assets/login/js/jquery.min.js') }}"></script> 
<script src="{{ asset('assets/login/js/bootstrap.bundle.min.js') }}"></script> 
<script src="{{ asset('assets/login/js/switcher.min.js') }}"></script> 
<script src="{{ asset('assets/login/js/theme.js') }}"></script> 


</body>
</html>