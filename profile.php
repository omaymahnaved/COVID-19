<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_user'])) {
    header('location: signup.php');
}

// DELETE
if (isset($_POST['delete_stud_image'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM covid_test_form WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been deleted.";
    } else {
        $_SESSION['status'] = "Failed to delete record.";
    }
    header('Location: profile.php');
    exit();
}

if (isset($_POST['delete'])) {
    $id = $_POST['delete_v'];

    $query = "DELETE FROM vaccination WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_v'] = "Record has been deleted.";
    } else {
        $_SESSION['status_v'] = "Failed to delete record.";
    }
    header('Location: profile.php');
    exit();
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

    <!-- BACK TO TOP CSS LINK -->
    <link href="css/backtotop.css" rel="stylesheet">

    <!-- FOOTER CSS LINK -->
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/dropdown.css" rel="stylesheet">

    <!-- FLAT ICON LINKS -->
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/fonts/flaticon-covid/font/flaticon.css">

    <!-- SUBMIT BTN CSS LINK -->
    <link href="css/submitbtn.css" rel="stylesheet">
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
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">
                                <span
                                    class="d-none d-lg-inline-flex px-3 "><?php echo htmlspecialchars($_SESSION['username_user']); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded m-0">
                                <a href="profile.php" class="dropdown-item active rounded-top">My Profile</a>
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
    </nav><br>
    <!-- Navbar & Hero End -->


    <!--Covid Result Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">
                        <h4 class="text-dark text-center mt-3">Your Covid Test Detail</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="font-weight: bold; font-size: 20px;">
                                <?php echo $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['status']);
                        }
                        ?>
                        <?php
                        $username = $_SESSION['username_user'];
                        $query = "SELECT * FROM covid_test_form WHERE name = '$username'";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:black; font-size: 21px;">Name</th>
                                        <th style="color:black; font-size: 21px;">Email</th>
                                        <th style="color:black; font-size: 21px;">Hospital</th>
                                        <th style="color:black; font-size: 21px;">Condition</th>
                                        <th style="color:black; font-size: 21px;">Request</th>
                                        <th style="color:black; font-size: 21px;">Result</th>
                                        <th style="color:black; font-size: 21px;">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['hospital']; ?></td>
                                                <td><?php echo $row['h_condition']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo $row['result']; ?></td>
                                                <td>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="delete_stud_image"
                                                            class="btn btn-danger rounded-pill"
                                                            style="font-size:14px ;">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">No record available</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <!-- Result End -->


    <!-- Vaccine Result start -->

    <?php
    $username = $_SESSION['username_user'];
    $query = "SELECT * FROM covid_test_form WHERE name = '$username' AND result ='Positive'";
    $query_run = mysqli_query($connection, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
    ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white">
                                <h4 class="text-dark text-center mt-3">Your Vaccination Detail</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['status_v']) && $_SESSION['status_v'] != '') {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        style="font-weight: bold; font-size: 20px;">
                                        <?php echo $_SESSION['status_v']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                    unset($_SESSION['status_v']);
                                }
                                ?>
                                <?php
                                $username = $_SESSION['username_user'];
                                $query = "SELECT * FROM vaccination WHERE name = '$username'";
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color:black; font-size: 21px;">Name</th>
                                                <th style="color:black; font-size: 21px;">Email</th>
                                                <th style="color:black; font-size: 21px;">Vaccine</th>
                                                <th style="color:black; font-size: 21px;">Hospital</th>
                                                <th style="color:black; font-size: 21px;">Date</th>
                                                <th style="color:black; font-size: 21px;">Time</th>
                                                <th style="color:black; font-size: 21px;">Request</th>
                                                <th style="color:black; font-size: 21px;">Progress</th>
                                                <th style="color:black; font-size: 21px;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['vaccine']; ?></td>
                                                        <td><?php echo $row['hospital']; ?></td>
                                                        <td><?php echo $row['date']; ?></td>
                                                        <td><?php echo $row['time']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><?php echo $row['progress']; ?></td>
                                                        <td>
                                                            <form action="" method="POST" class="d-inline">
                                                                <input type="hidden" name="delete_v" value="<?php echo $row['id']; ?>">
                                                                <button type="submit" name="delete" class="btn btn-danger rounded-pill"
                                                                    style="font-size:14px ;">DELETE</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="7">No record available</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
    <?php
        }
    } else {
    }
    ?>
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