<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_hospital'])) {
  header('location: signup.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>COVID-19 Management System</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Css Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!-- NAVBAR CSS LINK -->
  <link href="css/stylenav.css" rel="stylesheet">

  <!-- STATS CSS LINK -->
  <link href="css/stats.css" rel="stylesheet">

  <!-- FOOTER CSS LINK -->
  <link href="css/footer.css" rel="stylesheet">

  <!-- BACK TO TOP CSS LINK -->
  <link href="../css/backtotop.css" rel="stylesheet">

  <!-- FLAT ICON LINKS -->
  <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="assets/fonts/flaticon-covid/font/flaticon.css">
</head>


<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar & Hero Start -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a href="index.php">
        <img src="logo/logo-copy.png" style="height: 100px;" alt="COVID-19 Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="index.php" class="nav-item nav-link  px-3 active">Home</a>
          <a href="details.php" class="nav-item nav-link px-3 ">Details</a>

          <?php if (isset($_SESSION['username_hospital'])) { ?>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex px-3"><?php echo htmlspecialchars($_SESSION['username_hospital']); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded m-0">
                <a href="logout.php" class="dropdown-item">Log Out</a>
              </div>
            </div>
          <?php } else { ?>
            <div class="nav-item dropdown btn rounded-pill d-inline-flex flex-shrink-0">
              <a href="#" class="nav-link dropdown-toggle px-3" data-bs-toggle="dropdown">Login</a>
              <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded m-0">
                <a href="Hospital/login.php" class="dropdown-item">Hospital</a>
                <a href="signup.php" class="dropdown-item">Patients</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar & Hero End -->


  <!------------ FOOTER START ------------>
  <div class="site-footer" style="height: 350px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 text-center text-lg-left">
          <div class="mb-0 mt-0">
            <img src="logo/logo_1-copy.png" alt="logo" style="width:200px;">
          </div>
          <p>The name <span style="font-weight: bold; font-size: 18px;"> "COVID-19" </span> as a hospital management system immediately conveys its relevance and critical role during one of the most challenging times in modern healthcare.</p>
        </div>
        <div class="col-lg-8 text-center text-lg-left">
          <div class="row">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
              <h2 class="footer-heading mb-4" style="font-weight: bold; font-size:20px; text-decoration:underline;">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="about.php"></a></li>
                <li><a href="details.php">Details</a></li>
              </ul>
            </div>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
              <h2 class="footer-heading mb-4"
                style="font-weight: bold; font-size:20px; text-decoration:underline;">Helpful Links</h2>
              <ul class="list-unstyled social-icons">
                <li class="text-dark" style="font-weight: bold;"><a href="https://www.facebook.com/"
                    class="pl-0 pr-3" target="_blank"><span class="fab fa-facebook-f"
                      style="font-weight: bold; font-size: 22px; margin-right: 5%;"></span></a>Facebook
                </li>
                <li class="text-dark" style="font-weight: bold;"><a href="https://www.instagram.com/"
                    class="pl-0 pr-3" target="_blank"><span class="fab fa-instagram"
                      style="font-weight: bold; font-size: 22px; margin-right: 5%;"></span></a>Instagram
                </li>
                <li class="text-dark" style="font-weight: bold;"><a href="https://pk.linkedin.com/"
                    class="pl-0 pr-3" target="_blank"><span class="fab fa-linkedin-in"
                      style="font-weight: bold; font-size: 22px; margin-right: 5%;"></span></a>LinkedIn
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
              <h2 class="footer-heading mb-4" style="font-weight: bold; font-size:20px; text-decoration:underline;">Contact Info</h2>
              <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-map-marker-alt me-2"></i> Aptech NN Campus</a></li>
                <li><a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> covid19@gmail.com</a></li>
                <li><a href="tel:03468125700"><i class="fas fa-phone me-2"></i>03468125700</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center" style="margin-left: 5%;">
        <div class="col-md-12">
          <div class="border-top pt-5 pb-0">
            <p class="copyright" style="font-weight: bold; font-size: 20px;">
              Copyright &copy; 2024 All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!------------ FOOTER END ------------>


  <!-- Back to Top -->
  <a href="#" class="btn  btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>


  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>