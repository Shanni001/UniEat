<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Registration Form - UniEats</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  
  <!-- Registration CSS File -->
  <link href="{{ asset('css1/reg.css') }}" rel="stylesheet">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">UniEats</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
      <ul>
          <li><a href="index2" class="active">Home<br></a></li>
          <li><a href="index2#about">About</a></li>
          <!-- <li><a href="#menu">Menu</a></li> -->
          <!-- <li><a href="#events">Events</a></li> -->
          <li><a href="index2#chefs">Services</a></li>
          <li><a href="ndex2#gallery">Gallery</a></li>
         
          </li>
          <li><a href="index2#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        
      </nav>
     
      &nbsp; &nbsp; &nbsp;
      
      <a class="btn-getstarted" href="{{ url('/login') }}">Login </a>

    

    </div>
  </header>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="{{URL::to('registerUser')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" name="fullname" placeholder="Enter your name" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">User Type</span>
            <select name="user_type" id="user_type" required>
              <option value="Customer">User</option>
              <option value="Vendor">Vendor</option>
            </select>
          </div>
          <div class="input-box" id="restaurant_id_box" style="display: none;">
            <span class="details">Restaurant ID</span>
            <input type="text" name="restaurant_id" placeholder="Enter your restaurant ID">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <input type="radio" name="gender" id="dot-3" value="prefer_not_to_say">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="Registration" value="Register">
        </div>
      </form>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#user_type').change(function() {
        if ($(this).val() === 'Vendor') {
          $('#restaurant_id_box').show();
        } else {
          $('#restaurant_id_box').hide();
        }
      });
    });
  </script>

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
