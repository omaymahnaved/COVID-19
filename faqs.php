<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_user'])) {
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

    <!-- BACK TO TOP CSS LINK -->
    <link href="css/backtotop.css" rel="stylesheet">

    <!-- STATS CSS LINK -->
    <link href="css/stats.css" rel="stylesheet">

    <!-- FOOTER CSS LINK -->
    <link href="css/footer.css" rel="stylesheet">

    <!-- SUBMIT BTN CSS LINK -->
    <link href="css/submitbtn.css" rel="stylesheet">

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
                    <a href="index.php" class="nav-item nav-link px-3 ">Home</a>
                    <a href="faqs.php" class="nav-item nav-link px-3 active">FAQ's</a>
                    <a href="vaccines.php" class="nav-item nav-link px-3">Vaccines</a>
                    <a href="contact.php" class="nav-item nav-link px-3">Contact Us</a>
                    <a href="about.php" class="nav-item nav-link px-3">About Us</a>

                    <?php if (isset($_SESSION['username_user'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                                <span class="d-none d-lg-inline-flex px-3 "><?php echo htmlspecialchars($_SESSION['username_user']); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded m-0">
                                <a href="profile.php" class="dropdown-item rounded-top">My Profile</a>
                                <a href="logout.php" class="dropdown-item rounded-bottom">Log Out</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="nav-item dropdown px-3">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <span class="d-none d-lg-inline-flex">Login
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded m-0">
                                <a href="hospital/signup.php" class="dropdown-item">Hospital</a>
                                <a href="signup.php" class="dropdown-item">Patient</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>


    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: url('img/faq_banner.png'); background-size: cover; background-position: center;overflow: hidden;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            </ol>
        </div>
    </div>
    <!-- Header End -->

  
    <!-- Blog Start -->
    <h2 class="section-heading col-md-5 text-center mx-auto mt-5" style="padding-top: 70px;">Coronavirus disease (COVID-19): Variants of SARS-COV-2</h2>
    <div class="site-section stats">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-left mx-auto">
                    <h2 class="section-heading">1. What are variants of SARS-COV-2, the virus that causes COVID-19?</h2>
                    <p>It is usual for viruses to change and evolve as they spread between people over time. When these changes become significantly different to a previously detected virus, these new virus types are known as “variants.” To identify variants, scientists map the genetic material of viruses (known as sequencing) and then look for differences between them to see if they have changed.

                        Since 2020, SARS-CoV-2, the virus that causes COVID-19, has been spreading and changing globally. These changes have led to the detection of variants in many countries around the world. The more significant of these variants are grouped in three different ways – variants under monitoring, variants of interest and variants of concern</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section stats">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-left mx-auto">
                    <h2 class="section-heading">2. What is the difference between variants under monitoring, variants of interest, and variants of concern?
                    </h2>
                    <p>A Variant Under Monitoring (VUM) is a term used to signal to public health authorities that a SARS-CoV-2 variant may require prioritized attention and monitoring. The main objective of this category is to investigate if this variant (and others closely related to it) may pose an additional threat to global public health as compared to other circulating variants.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Start -->
    <div class="container-fluid text-center">
        <img src="img/faq_banner2.png" alt="banner" style="width: 80%;border-radius:30px;">
    </div>
    <!-- Banner End -->


    <div class="site-section stats">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-left mx-auto">
                    <h2 class="section-heading">3. What can I do to protect myself from SARS-CoV-2 variants?</h2>
                    <p>To protect yourself and others from all SARS-CoV-2 (COVID-19), including all the virus variants, consider the following:

                        <li>wear a mask when in crowded, enclosed, or poorly ventilated areas, and keep a safe distance from others, as feasible</li>
                        <li>practice respiratory etiquette - covering coughs and sneezes</li>
                        <li>clean your hands regularly with soap and water or alcohol-based sanitizer</li>
                        <li>stay up to date with vaccinations, including booster/additional doses</li>
                        <li>stay home if you are sick</li>
                        <li>get tested if you have symptoms or you’ve been exposed to SARS-CoV-2.</li>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section stats">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-left mx-auto">
                    <h2 class="section-heading">4. How can we stop new variants from emerging?</h2>
                    <p>As with all viruses, SARS-CoV-2, the virus that causes COVID-19, will continue to evolve as long as it continues to spread. The more that the virus spreads, the more pressure there is for the virus to change. So, the best way to prevent more variants from emerging is to stop the spread of the virus.<br>
                        Follow these measures to protect yourself and others from all SARS-CoV-2 variants:
                        <li> wear a mask when in crowded, enclosed, or poorly ventilated areas, and keep a safe distance from others, as feasible</li>
                        <li>practice respiratory etiquette - covering coughs and sneezes</li>
                        <li>clean your hands regularly with soap and water or alcohol-based sanitizer</li>
                        <li>stay up to date with vaccinations, including additional doses
                        <li>
                        <li>stay home if you are sick</li>
                        <li>get tested if you have symptoms or you’ve been exposed to SARS-CoV-2
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section stats">
        <div class="container">
            <div class="row mb-2">
                <div class="col text-left mx-auto">
                    <h2 class="section-heading">5. Do COVID-19 vaccines protect against newer virus variant?</h2>
                    <p>IThe COVID-19 vaccines with WHO Emergency Use Listing (EUL) or approval from stringent regulatory authorities (SRAs) provide different levels of protection against infection, mild disease, severe disease, hospitalization, and death, and are most effective against severe disease. Research is ongoing by thousands of scientists around the world to better understand how new virus mutations and variants affect the effectiveness of the different COVID-19 vaccines.</p>
                </div>
            </div>
        </div>
    </div><br>


    <!------------ FOOTER START ------------>
    <div class="site-footer" style="height: 350px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center text-lg-left">
                    <div class="mb-0 mt-0">
                        <img src="logo/logo_1-copy.png" alt="logo" style="width:200px;">
                    </div>
                    <p>The name <span style="font-weight: bold; font-size: 18px;"> "COVID-19" </span> as a hospital
                        management system immediately conveys its relevance and critical role during one of the most
                        challenging times in modern healthcare.</p>
                </div>
                <div class="col-lg-8 text-center text-lg-left">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                            <h2 class="footer-heading mb-4"
                                style="font-weight: bold; font-size:20px; text-decoration:underline;">Quick Links</h2>
                            <ul class="list-unstyled">
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="profile.php">My Profile</a></li>
                                <li><a href="vaccines.php">Vaccines</a></li>
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
                            <h2 class="footer-heading mb-4"
                                style="font-weight: bold; font-size:20px; text-decoration:underline;">Contact Info</h2>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-map-marker-alt me-2"></i> Aptech NN Campus</a></li>
                                <li><a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i>
                                        covid19@gmail.com</a></li>
                                <li><a href="tel:03468125700"><i class="fas fa-phone me-2"></i>03468125700</a>
                                </li>
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
    <a href="#" class="btn btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


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