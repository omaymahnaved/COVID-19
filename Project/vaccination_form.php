<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_user'])) {
    header('location: signup.php');
}


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $vaccine = mysqli_real_escape_string($connection, $_POST['vaccine']);
    $hospital = mysqli_real_escape_string($connection, $_POST['hospital']);
    $date = mysqli_real_escape_string($connection, $_POST['date']);
    $time = mysqli_real_escape_string($connection, $_POST['time']);

    $queryinsert = "INSERT INTO `vaccination` (`name`,`email`,`vaccine`,`hospital`,`date`,`time`) VALUES ('$name','$email','$vaccine','$hospital','$date','$time')";
    $resultInsert = mysqli_query($connection, $queryinsert);

    header('location: profile.php');
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
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/submitbtn.css" rel="stylesheet">

    <!-- FLAT ICON LINKS -->
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/flaticon-covid/font/flaticon.css"> <!-- Alert on submission -->
    <script>
        function showAlert() {
            alert('Your vaccination request has been sent!');
        }
    </script>

</head>

<body>

    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="index.php">
                <img src="logo/logo-copy.png" style="height: 100px;" alt="COVID-19 Logo">
            </a>
            <!-- <h4 class="pt-2 px-4 text-info polysite-text"style="font-family: sans-serif; font-weight: bold; font-size: 35px;">PolySite</h4> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link px-3">Home</a>
                    <a href="faqs.php" class="nav-item nav-link px-3">FAQ's</a>
                    <a href="vaccines.php" class="nav-item nav-link px-3">Vaccines</a>
                    <a href="contact.php" class="nav-item nav-link px-3">Contact Us</a>
                    <a href="about.php" class="nav-item nav-link px-3">About Us</a>

                    <?php if (isset($_SESSION['username_user'])) { ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
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

    <!-- Navbar & Hero End -->


    <!-- Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 h-100 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center mx-auto pb-5" style="max-width: 800px;">
                        <h4 style="color: #8c52ff; font-weight:bold;" class="text-uppercase">Get</h4>
                        <h1 class="display-3 text-capitalize mb-3">Vaccinated</h1>
                    </div>
                    <form action="" method="POST" onsubmit="showAlert()">
                        <div class="row g-4">
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <?php
                                    $username = $_SESSION['username_user'];
                                    $query2 = "SELECT * FROM registeration WHERE name = '$username'";
                                    $validate = mysqli_query($connection, $query2);
                                    while ($show = mysqli_fetch_assoc($validate)) {
                                        echo '<input type="text" class="form-control border-0 rounded" id="name" placeholder="Your Name" name="name" value="' . htmlspecialchars($show['name']) . '" readonly>';
                                    } ?>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <?php
                                    $username = $_SESSION['username_user'];
                                    $query2 = "SELECT * FROM registeration WHERE name = '$username'";
                                    $validate = mysqli_query($connection, $query2);
                                    while ($show = mysqli_fetch_assoc($validate)) {
                                        echo '<input type="email" class="form-control border-0 rounded" id="email" placeholder="Your Email" name="email" value="' . htmlspecialchars($show['email']) . '" readonly>';
                                    } ?>
                                    <label for="name">Your Email</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select form-control bg-white border-0 rounded"
                                        aria-label="Vaccine Selection" name="vaccine" required>
                                        <option value="" disabled selected>Select Vaccine</option>
                                        <?php
                                        $query1 = "SELECT * FROM `vaccines` WHERE `status` = 'Available'";
                                        $validate2 = mysqli_query($connection, $query1);
                                        while ($show = mysqli_fetch_assoc($validate2)) {
                                            echo '<option value="' . htmlspecialchars($show['title']) . '">' . htmlspecialchars($show['title']) . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="vaccine">Select Vaccine</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <select class="form-select form-control bg-white border-0 rounded"
                                        aria-label="Hospital Selection" name="hospital" required>
                                        <option value="" disabled selected>Select Hospital</option>
                                        <?php
                                        $query1 = "SELECT * FROM `hospital_registeration`  WHERE `status` = 'Accepted'";
                                        $validate2 = mysqli_query($connection, $query1);
                                        while ($show = mysqli_fetch_assoc($validate2)) {
                                            echo '<option value="' . htmlspecialchars($show['name']) . '">' . htmlspecialchars($show['name']) . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <label for="hospital">Hospital</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="date" name="date" required
                                        class="form-control bg-white border-0 rounded" id="floatingInput"
                                        placeholder="20-10-2005">
                                    <label for="floatingInput">Desired Date</label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="form-floating">
                                    <input type="time" id="time" name="time" required
                                        class="form-control bg-white border-0 rounded">
                                    <label for="time">Time</label>
                                </div>
                            </div>

                            <!-- script for date/time -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var datePicker = document.getElementsByName('date')[0];

                                    datePicker.addEventListener('change', function() {
                                        var selectedDate = new Date(datePicker.value + 'T00:00:00');

                                        var currentDate = new Date();

                                        if (selectedDate < currentDate) {
                                            alert('Please choose a future date.');
                                            datePicker.value = '';
                                        }
                                    });
                                });
                            </script>
                            <!-- end -->

                            <div class="col-12 text-center">
                                <button type="submit" value="SUBMIT" name="submit"
                                    class="btn btn-custom w-100 py-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="h-100">
                                <img src="img/vaccination.png" alt="" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End -->


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