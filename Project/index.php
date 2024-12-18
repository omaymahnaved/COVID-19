<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_user'])) {
    header('location: signup.php');
}
?>
<!DOCTYPE html>+
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

    <!-- SUBMIT BTN CSS LINK -->
    <link href="css/submitbtn.css" rel="stylesheet">

    <!-- NAVBAR DROPDOWN CSS LINK -->
    <link href="css/dropdown.css" rel="stylesheet">

    <!-- BACK TO TOP CSS LINK -->
    <link href="css/backtotop.css" rel="stylesheet">
    
    <!-- BACK TO TOP CSS LINK -->
    <link href="css/carousel.css" rel="stylesheet">

    <!-- FLAT ICON LINKS -->
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/flaticon-covid/font/flaticon.css">

    <!-- css for rating -->
    <style>
        .rating {
            margin: 10px 0;
        }

        .star {
            font-size: 1.5rem;
            color: gold;
        }

      .star.filled {
            color: gold;
        }

        .star:not(.filled) {
            color: gold;
        }



    </style>
</head>

<body>


    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                    <a href="index.php" class="nav-item nav-link px-3 active">Home</a>
                    <a href="faqs.php" class="nav-item nav-link px-3">FAQ's</a>
                    <a href="vaccines.php" class="nav-item nav-link px-3">Vaccines</a>
                    <a href="contact.php" class="nav-item nav-link px-3">Contact Us</a>
                    <a href="about.php" class="nav-item nav-link px-3">About Us</a>

                    <?php if (isset($_SESSION['username_user'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                                <span
                                    class="d-none d-lg-inline-flex px-3 "><?php echo htmlspecialchars($_SESSION['username_user']); ?></span>
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



    <!-- Carousel Start -->
    <div class="carousel-header">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="carouselbg/banner_1.png" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption-1">
                        <div class="carousel-caption-1-content" style="max-width: 900px;">
                            <h1 class="display-2 text-capitalize text-white mb-4 fadeInLeft animated"
                                data-animation="fadeInLeft" data-delay="1.3s" style="animation-delay: 1.3s;">Find a
                                COVID-19 vaccine near you</h1>
                            <p class="mb-5 fs-5 text-white fadeInLeft animated" data-animation="fadeInLeft"
                                data-delay="1.5s" style="animation-delay: 1.5s;">Stay protected and stay informed with
                                our Vaccine Management System. Our platform ensures timely reminders, secure health
                                records, and easy access to vaccination centers, all in one place.
                            </p>
                            <div class="carousel-caption-1-content-btn fadeInLeft animated" data-animation="fadeInLeft"
                                data-delay="1.7s" style="animation-delay: 1.7s;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="carouselbg/banner_2.png" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption-2">
                        <div class="carousel-caption-2-content" style="max-width: 900px;">
                            <h1 class="display-2 text-capitalize text-white mb-4 fadeInRight animated"
                                data-animation="fadeInRight" data-delay="1.3s" style="animation-delay: 1.3s;">Let’s Get
                                Vaccinated</h1>
                            <p class="mb-5 fs-5 text-white fadeInRight animated" data-animation="fadeInRight"
                                data-delay="1.5s" style="animation-delay: 1.5s;">Getting vaccinated is the best way to
                                protect yourself from Covid-19.
                            </p>
                            <div class="carousel-caption-2-content-btn fadeInRight animated"
                                data-animation="fadeInRight" data-delay="1.7s" style="animation-delay: 1.7s;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn btn-primary fadeInLeft animated" aria-hidden="true"
                    data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"> <i
                        class="fa fa-angle-left fa-3x"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn btn-primary fadeInRight animated" aria-hidden="true"
                    data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                        class="fa fa-angle-right fa-3x"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5" id="prevention">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="text-uppercase" style="color: #8c52ff; font-weight:bold;">PREVENTION</h1>
                <h1 class="display-3 text-capitalize mb-3">Few tips of Prevention for COVID-19</h1>
            </div>
            <div class="row g-4">
                <div class=" col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <?php
                    $query1 = "SELECT * FROM `feature` WHERE `id` = '1'";
                    $validate2 = mysqli_query($connection, $query1);
                    while ($show = mysqli_fetch_assoc($validate2)) {
                        ?>
                        <div class="feature-item p-4" style="height: 380px;">
                            <div class="feature-icon mb-3" style="background-color: #cb6ce6;"><i
                                    class="fas fa-head-side-mask text-white fa-3x"></i></div>
                            <p class="h4 mb-3" style="font-family: sans-serif; font-weight: bold;">
                                <?php echo $show['title'] ?>
                            </p>
                            <p class="mb-3"><?php echo $show['description'] ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class=" col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <?php
                    $query1 = "SELECT * FROM `feature` WHERE `id` = '2'";
                    $validate2 = mysqli_query($connection, $query1);
                    while ($show = mysqli_fetch_assoc($validate2)) {
                        ?>
                        <div class="feature-item p-4" style="height: 380px;">
                            <div class="feature-icon mb-3" style="background-color: #cb6ce6;"><i
                                    class="fas fa-people-arrows text-white fa-3x"></i></div>
                            <p class="h4 mb-3" style="font-family: sans-serif; font-weight: bold;">
                                <?php echo $show['title'] ?>
                            </p>
                            <p class="mb-3"><?php echo $show['description'] ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class=" col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <?php
                    $query1 = "SELECT * FROM `feature` WHERE `id` = '3'";
                    $validate2 = mysqli_query($connection, $query1);
                    while ($show = mysqli_fetch_assoc($validate2)) {
                        ?>
                        <div class="feature-item p-4" style="height: 380px;">
                            <div class="feature-icon mb-3" style="background-color: #cb6ce6;"><i
                                    class="fas fa-syringe text-white fa-3x"></i></div>
                            <p class="h4 mb-3" style="font-family: sans-serif; font-weight: bold;">
                                <?php echo $show['title'] ?>
                            </p>
                            <p class="mb-3"><?php echo $show['description'] ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class=" col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <?php
                    $query1 = "SELECT * FROM `feature` WHERE `id` = '4'";
                    $validate2 = mysqli_query($connection, $query1);
                    while ($show = mysqli_fetch_assoc($validate2)) {
                        ?>
                        <div class="feature-item p-4" style="height: 380px;">
                            <div class="feature-icon mb-3" style="background-color: #cb6ce6;"><i
                                    class="fas fa-hand-sparkles text-white fa-3x"></i></div>
                            <p class="h4 mb-3" style="font-family: sans-serif; font-weight: bold;">
                                <?php echo $show['title'] ?>
                            </p>
                            <p class="mb-3"><?php echo $show['description'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div><br>
        <!-- Covid test apply start -->
        <a href="covid_test.php" id="btnfeedback">
            <div class=" text-center">
                <input class="btn btn-custom pt-3 pb-3 w-50 rounded-pill" style="font-size: 20px; font-weight:700;"
                    value="Apply For Covid Test">
            </div>
        </a>
        <!-- end -->
    </div>
    <!-- Feature End -->


    <!-- Statistics Counter -->
    <div class="site-section stats">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 style="color: #8c52ff; font-weight:bold;">Coronavirus Statistics</h1>
                    <p>Coronavirus statistics track the number of confirmed cases, recoveries, and deaths globally,
                        providing crucial data for understanding the spread and impact of the virus.</p>
                </div>
            </div>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-4">
                        <div class="data">
                            <span class="icon" style="color: #cb6ce6;">
                                <span class="flaticon-virus"></span>
                            </span>
                            <strong class="d-block number" id="active-cases">14,112,077</strong>
                            <span class="label" style="font-size: 20px;">Active Cases</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="data">
                            <span class="icon" style="color: #cb6ce6;">
                                <span class="flaticon-virus"></span>
                            </span>
                            <strong class="d-block number" id="deaths">595,685</strong>
                            <span class="label" style="font-size: 20px;">Deaths</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="data">
                            <span class="icon" style="color: #cb6ce6;">
                                <span class="flaticon-virus"></span>
                            </span>
                            <strong class="d-block number" id="recovered-cases">8,397,665</strong>
                            <span class="label" style="font-size: 20px;">Recovered Cases</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function animateValue(id, start, end, duration) {
            let range = end - start;
            let current = start;
            let increment = end > start ? 1 : -1;
            let stepTime = Math.abs(Math.floor(duration / range));
            let obj = document.getElementById(id);
            let timer = setInterval(function () {
                current += increment;
                obj.innerHTML = current.toLocaleString();
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        document.addEventListener("DOMContentLoaded", function () {
            animateValue("active-cases", 14110000, 14112077, 1);
            animateValue("deaths", 595000, 595685, 1);
            animateValue("recovered-cases", 8394000, 8397665, 1);
        });
    </script>
    <!-- Statistics Counter END -->


    <!-- Service Start -->
    <div class="container-fluid  bg-light overflow-hidden py-5" id="services">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 style=" font-weight:bold;" class="text-primary">Our Services</h1>
                <h1 class="display-3 text-capitalize mb-3">Protect Your Health with Our COVID-19 Vaccine</h1>
            </div>
            <div class="row gx-0 gy-4 align-items-center">
                <div class="col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="service-content text-start">
                                        <a href="#" class="h4 d-inline-block mb-3">Vaccine Administration</a>
                                        <p class="mb-0">We provide safe and effective COVID-19 vaccinations administered
                                            by certified professionals.</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn"><i class="fas fa-syringe text-white fa-2x"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="service-content text-start">
                                        <a href="#" class="h4 d-inline-block mb-3">Safety Protocols
                                        </a>
                                        <p class="mb-0">Adherence to the highest safety standards and protocols to
                                            ensure the well-being of our patients.</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn"><i class="fas fa-shield-alt text-white fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="service-content text-start">
                                        <a href="#" class="h4 d-inline-block mb-3">Community Support</a>
                                        <p class="mb-0">We are committed to supporting our community through vaccination
                                            drives and education.</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn"><i class="fas fa-hands-helping text-white fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-transparent">
                        <img src="img/services.png" class="img-fluid w-100" alt="Vaccine">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="pe-4">
                                        <div class="service-btn"><i class="fas fa-calendar-day text-white fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3">Appointment Scheduling</a>
                                        <p class="mb-0">Easily schedule your vaccine appointment online with our
                                            convenient booking system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="pe-4">
                                        <div class="service-btn"><i class="fas fa-info-circle text-white fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3">Vaccination Information</a>
                                        <p class="mb-0">Get detailed information about COVID-19 Result, including
                                            benefits and potential side effects.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="pe-4">
                                        <div class="service-btn"><i class="fas fa-headset text-white fa-2x"></i></div>
                                    </div>
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3">Customer Support</a>
                                        <p class="mb-0">Contact our support team for any questions or assistance
                                            regarding your vaccination.</p><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <!-- Vaccination apply start -->
        <?php
        $username = $_SESSION['username_user'];
        $query = "SELECT * FROM covid_test_form WHERE name = '$username' AND result ='Positive'";
        $query_run = mysqli_query($connection, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $row) {
                ?>
                <a href="vaccination_form.php" id="btnfeedback">
                    <div class=" text-center">
                        <input class="btn btn-custom pt-3 pb-3 w-50 rounded-pill" style="font-size: 20px; font-weight:700;"
                            value="Apply For Vaccine">
                    </div>
                </a>
                <?php
            }
        } else {

        }
        ?>
        <!-- end -->


    </div>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-3 text-capitalize mb-3">Our clients reviews.</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp text-dark bg-light rounded"
                data-wow-delay="0.3s">
                <?php
                $query1 = "SELECT * FROM `feedback`";
                $validate2 = mysqli_query($connection, $query1);
                while ($show = mysqli_fetch_assoc($validate2)) {
                    ?>
                    <div class="testimonial-item text-center p-4">
                        <p>
                            <?php echo $show['comment']; ?>
                        </p>
                        <div class="d-block">
                            <h4 class="text-dark"><?php echo htmlspecialchars($show['name']); ?>
                            </h4>
                            <div class="rating">
                                <?php
                                $rating = intval($show['rating']);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span class="star filled">&#9733;</span>';
                                    } else {
                                        echo '<span class="star">&#9734;</span>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- FEEDBACK FORM BTN START -->
    <a href="feedback.php" id="btnfeedback">
        <div class=" text-center" style="margin-bottom: 5%;">
            <input class="btn btn-custom pt-3 pb-3 w-50 rounded-pill" style="font-size: 20px; font-weight:700;"
                value="Click here to Give Us A Feedback">
        </div>
    </a>
    <!-- FEEDBACK FORM BTN END -->


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