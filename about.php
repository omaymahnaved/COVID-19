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

    <!-- FLAT ICON LINKS -->
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/flaticon-covid/font/flaticon.css">

    <!-- About us css -->
    <link rel="stylesheet" href="css/about.css">

    <!-- STATS CSS LINK -->
    <link href="css/stats.css" rel="stylesheet">

</head>
<style>
    body {
        background-color: white;
    }

    .heading h1::after {
        content: '';
        /* position: absolute; */
        width: 100%;
        height: 4px;
        display: block;
        /* margin: 0 auto; */
        background-color: #8c52ff;
    }
</style>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
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
                    <a href="faqs.php" class="nav-item nav-link px-3">FAQ's</a>
                    <a href="vaccines.php" class="nav-item nav-link px-3">Vaccines</a>
                    <a href="contact.php" class="nav-item nav-link px-3">Contact Us</a>
                    <a href="about.php" class="nav-item nav-link px-3 active">About Us</a>

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
    <!-- Navbar & Hero End -->


    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb" style="background-image: url('img/contactBanner.png'); background-size: cover; background-position: center;overflow: hidden;">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-dark display-4 mb-0 mt-5 wow fadeInDown" data-wow-delay="0.1s">About Us</h4>

        </div>
    </div>
    <!-- Header End -->


    <!-- About Start  -->
    <div class="container-fluid about overflow-hidden py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <img src="img/aboutusimg2.png" class="img-fluid rounded h-100 w-100" style="object-fit: cover;" alt="img">
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-item">
                        <h4 style=" font-weight:bold;" class="text-center text-uppercase">About Us</h4>
                        <h1 style="color: #8c52ff; font-weight:bold;" class="text-center text-uppercase">Our story</h1>

                        <p class="mb-4 text-dark" style="font-weight: 500;"> <span style="color: #8c52ff; font-size: 20px; font-weight:bold;">COVID-19</span> was founded in response to the global COVID-19 pandemic, recognizing the urgent need for a more organized and efficient vaccination process. What began as a small project to help local healthcare providers quickly grew into a comprehensive platform now used by number of providers across regions. Our journey is driven by the desire to make a positive impact and help end the pandemic.
                        </p>
                        <div class="bg-light rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="pe-4">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;background-color: #8c52ff;"><i class="fas fa-bullseye text-white fa-2x"></i></div>
                                        </div>
                                        <div class="">
                                            <p href="#" class="h4 d-inline-block mb-3" style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;color: #8c52ff;">Our Mission</p>
                                            <p class="mb-0">At COVID-19, our mission is to ensure that everyone has access to safe, efficient, and timely COVID-19 vaccinations. We believe in the power of technology to make healthcare more accessible and effective, and we are committed to helping communities combat the pandemic through innovative solutions.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="pe-4">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;background-color: #8c52ff;"><i class="fas fa-question text-white fa-2x"></i></div>
                                        </div>
                                        <div>
                                            <p href="#" class="h4 d-inline-block mb-3" style="font-family:Arial, Helvetica, sans-serif;font-weight:bold;color: #8c52ff;">Who We Are</p>
                                            <p class="mb-0">We are a dedicated team of healthcare professionals, technologists, and community leaders united by a common goal: to manage and streamline the COVID-19 vaccination process. Our platform is designed to assist healthcare providers in scheduling, tracking, and managing vaccinations, ensuring that no one falls through the cracks.</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End  -->


    <!-- Statistics Counter -->
    <div class="site-section stats bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 style="color: #8c52ff; font-weight:bold;">Coronavirus Statistics</h1>
                    <p>Coronavirus statistics track the number of confirmed cases, recoveries, and deaths globally, providing crucial data for understanding the spread and impact of the virus.</p>
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
            let timer = setInterval(function() {
                current += increment;
                obj.innerHTML = current.toLocaleString();
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        document.addEventListener("DOMContentLoaded", function() {
            animateValue("active-cases", 14110000, 14112077, 1);
            animateValue("deaths", 595000, 595685, 1);
            animateValue("recovered-cases", 8394000, 8397665, 1);
        });
    </script>
    <!-- Statistics Counter END -->


    <!-- ABOUT TEAM START -->
    <div class="heading" style="margin-top: 10%;">
        <h1>Our Team</h1>
        <p class="text-dark" style="font-weight: 450;">"Our leadership team is composed of experts in healthcare, logistics, and technology, all united by a common goal: to fight the pandemic with innovative solutions."</p>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="about_imgs/Maam.jpg" alt="IMAGE" class="rounded">
            </div>
            <div class="about-content">
                <h2>CEO (Miss Wajiha)</h2>
                <p>A good friend is the only relation which we earn in whole life. To find a good friend who is loving, caring, helpful, honest, loyal, and most important for you. This is the biggest achievement of us which we get in the form of Miss Wajiha. Undoubtedly, we always learn something new and exciting in the company of our teacher Miss Wajiha. She inspire students to think like developers and problem solvers.</p>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-content">
                <h2>(Leader) Omaymah</h2>
                <p>Omaymah is the leader of our team, played a crucial role in designing the user interface for the COVID-19 vaccine management system website. Her design ensures that healthcare providers can easily navigate the system, manage vaccine schedules, and track distribution with minimal effort. A good leader understands that a level of creativity is needed for effective problem solving.Taking risks and making brave decisions. Facing challenges and difficulties with courage.</p>
            </div>
            <div class="about-image">
                <img src="about_imgs/Omay.jpg" alt="IMAGE" class="rounded">
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="about_imgs/AhmedRaza.jpeg" alt="IMAGE" class="rounded">
            </div>
            <div class="about-content">
                <h2>Ahmed Raza</h2>
                <p>Trustworthy, dependable and reliable, often demonstrating integrity in his work. His work ensures that the website can handle large volumes of data, providing real-time updates and seamless integration with other healthcare systems. Ahmad expertise in security and performance optimization has been vital in creating a platform that meets the stringent requirements of managing COVID-19 vaccine distribution.</p>
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-content">
                <h2>Ayesha</h2>
                <p>Ayesha bring a wealth of experience and expertise to our project. Her problem-solving skill and collaborative nature make her an invaluable asset to our team, consistently delivering high-quality results.</p>
            </div>
            <div class="about-image">
                <img src="about_imgs/Ayesha.jpeg" alt="IMAGE" class="rounded">
            </div>
        </section>
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="about_imgs/Affan.jpg" alt="IMAGE" class="rounded">
            </div>
            <div class="about-content">
                <h2>Affan Vohra</h2>
                <p>Believe in your team. The truth of what makes a good team player lies in their ability to trust the efforts of their team.They share what they learn and embrace a mentoring role.</p>
            </div>
        </section>
    </div>
    <div class="container" style="margin-bottom: 10%;">
        <section class="about">
            <div class="about-content">
                <h2>Arooba Jahan</h2>
                <p>Team players complete tasks and meet targets. If you're a team player, you understand that your behaviour at work affects the entire team.Maintaining a positive attitude, even when times get tough, exhibits a strong team player.</p>
            </div>
            <div class="about-image">
                <img src="about_imgs/Arooba.jpeg" alt="IMAGE" class="rounded">
            </div>
        </section>
    </div>
    <!-- ABOUT TEAM END -->


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