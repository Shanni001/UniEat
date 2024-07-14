<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - UniEats</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css1/login.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Jun 14 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">UniEats</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index2" class="active">Home</a></li>
          <li><a href="index2#about">About</a></li>
          <li><a href="index2#chefs">Services</a></li>
          <li><a href="index2#gallery">Gallery</a></li>
          <li><a href="index2#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <a class="btn-getstarted" href="{{ url('/registration') }}">Sign Up</a>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <a class="btn-getstarted" href="{{ url('/login') }}">Login</a>
     
    </div>
  </header>

  <div class="wrapper">
    <div class="title">Login Form</div>

    @if(session()->has('success'))
    <div class="alert alert-success">
      <p>{{ session()->get('success') }}</p>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">
      <p>{{ session()->get('error') }}</p>
    </div>
    @endif

    <form action="{{ URL::to('loginUser') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="field">
        <input type="email" name="email" placeholder="Email" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" name="password" placeholder="Password" required>
        <label>Password</label>
      </div>
      <div class="content">
        <div class="checkbox">
          <input type="checkbox" id="remember-me">
          <label for="remember-me">Remember me</label>
        </div>
        <div class="pass-link">
          <a href="#">Forgot password?</a>
        </div>
      </div>
      <div class="field">
        <input type="submit" name="login" value="Login">
      </div>
      <div class="signup-link">
        Not a member? <a href="{{ URL::to('/registration') }}">Signup now</a>
      </div>
      <div class="line"></div>
      <div class="media-options">
        <a href="{{ URL::to('googleLogin') }}">
          <img src="assets/images/google1.png" alt="">
          <span>Login with Google</span>
        </a>
      </div>
    </form>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
