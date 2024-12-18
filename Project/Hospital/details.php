<?php
include 'configuration.php';
session_start();

if (!isset($_SESSION['username_hospital'])) {
    header('location: signup.php');
}

//////////////////////////////////   Vaccination

// ACCEPT
if (isset($_POST['accept_stud_image'])) {
    $id = $_POST['accept_id'];

    $query = "UPDATE covid_test_form SET status='Accepted' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been accepted.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}

// DELETE
if (isset($_POST['delete_stud_image'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM covid_test_form WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been rejected.";
    } else {
        $_SESSION['status'] = "Failed to delete record.";
    }
    header('Location: details.php');
    exit();
}

// positive
if (isset($_POST['positive_stud_image'])) {
    $id = $_POST['positive_id'];

    $query = "UPDATE covid_test_form SET result='Positive' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been updated.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}

// negative
if (isset($_POST['negative_stud_image'])) {
    $id = $_POST['negative_id'];

    $query = "UPDATE covid_test_form SET result='Negative' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been updated.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}


//////////////////////////////////   Vaccination

// ACCEPT
if (isset($_POST['accept_stud_image_c'])) {
    $id = $_POST['accept_id_c'];

    $query = "UPDATE vaccination SET status='Accepted' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_1'] = "Record has been accepted.";
    } else {
        $_SESSION['status_1'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}

// DELETE
if (isset($_POST['delete_stud_image_c'])) {
    $id = $_POST['delete_id_c'];

    $query = "DELETE FROM vaccination WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_1'] = "Record has been rejected.";
    } else {
        $_SESSION['status_1'] = "Failed to delete record.";
    }
    header('Location: details.php');
    exit();
}

// 1ST
if (isset($_POST['submit_1'])) {
    $id = $_POST['one'];

    $query = "UPDATE vaccination SET progress='1st' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_1'] = "Record has been updated.";
    } else {
        $_SESSION['status_1'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}

// 2ND
if (isset($_POST['submit_2'])) {
    $id = $_POST['second'];

    $query = "UPDATE vaccination SET progress='2nd' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_1'] = "Record has been updated.";
    } else {
        $_SESSION['status_1'] = "Failed to update record.";
    }
    header('Location: details.php');
    exit();
}

// 3rd
if (isset($_POST['submit_3'])) {
    $id = $_POST['third'];

    $query = "UPDATE vaccination SET progress='3rd' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status_1'] = "Record has been updated.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: details.php');
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

  <!-- BACK TO TOP CSS LINK -->
  <link href="../css/backtotop.css" rel="stylesheet">

    <!-- STATS CSS LINK -->
    <link href="css/stats.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

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
                    <a href="index.php" class="nav-item nav-link  px-3">Home</a>
                    <a href="faqs.php" class="nav-item nav-link px-3 active">Details</a>

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

    <!-- Details start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">
                        <h4 class="text-dark text-center mt-3">Applied Covid Test Detail</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-weight: bold; font-size: 20px;">
                                <?php echo $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['status']);
                        }
                        ?>
                        <?php
                        $username_hospital = $_SESSION['username_hospital'];
                        $query = "SELECT * FROM covid_test_form WHERE hospital = '$username_hospital'";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:black; font-size: 21px;">ID</th>
                                        <th style="color:black; font-size: 21px;">Name</th>
                                        <th style="color:black; font-size: 21px;">Email</th>
                                        <th style="color:black; font-size: 21px;">Hospital</th>
                                        <th style="color:black; font-size: 21px;">Condition</th>
                                        <th style="color:black; font-size: 21px;">Status</th>
                                        <th style="color:black; font-size: 21px;" class="text-center">Select</th>
                                        <th style="color:black; font-size: 21px;">Result</th>
                                        <th style="color:black; font-size: 21px;" class="text-center">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['hospital']; ?></td>
                                                <td><?php echo $row['h_condition']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td class="text-center">
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="accept_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="accept_stud_image" class="btn btn-success rounded-pill">Accept</button>
                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="delete_stud_image" class="btn btn-danger rounded-pill  mt-1">Reject</button>
                                                    </form>
                                                </td>
                                                <td><?php echo $row['result']; ?></td>
                                                <td class="text-center">
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="positive_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="positive_stud_image" class="btn btn-success rounded-pill">Positive</button>
                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="negative_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="negative_stud_image" class="btn btn-danger rounded-pill  mt-1">Negative</button>
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
    <!-- end -->


    <!-- Vaccination Start -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white">
                        <h4 class="text-dark text-center mt-3">Applied Vaccination Detail</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['status_1']) && $_SESSION['status_1'] != '') {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-weight: bold; font-size: 20px;">
                                <?php echo $_SESSION['status_1']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['status_1']);
                        }
                        ?>
                        <?php
                        $username_hospital = $_SESSION['username_hospital'];
                        $query = "SELECT * FROM vaccination WHERE hospital = '$username_hospital'";
                        $query_run = mysqli_query($connection, $query);
                        ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="color:black; font-size: 21px;">ID</th>
                                        <th style="color:black; font-size: 21px;">Name</th>
                                        <th style="color:black; font-size: 21px;">Email</th>
                                        <th style="color:black; font-size: 21px;">vaccine</th>
                                        <th style="color:black; font-size: 21px;">Hospital</th>
                                        <th style="color:black; font-size: 21px;">Date</th>
                                        <th style="color:black; font-size: 21px;">Time</th>
                                        <th style="color:black; font-size: 21px;">Status</th>
                                        <th style="color:black; font-size: 21px;" class="text-center">Select</th>
                                        <th style="color:black; font-size: 21px;">Result</th>
                                        <th style="color:black; font-size: 21px;" class="text-center">Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['vaccine']; ?></td>
                                                <td><?php echo $row['hospital']; ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['time']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td class="text-center">
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="accept_id_c" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="accept_stud_image_c" class="btn btn-success rounded-pill">Accept</button>
                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="delete_id_c" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="delete_stud_image_c" class="btn btn-danger rounded-pill  mt-1">Reject</button>
                                                    </form>
                                                </td>
                                                <td><?php echo $row['progress']; ?></td>
                                                <td class="text-center">
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="one" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="submit_1" class="btn btn-success rounded-pill">1st</button>
                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="second" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="submit_2" class="btn btn-danger rounded-pill  mt-1">2nd</button>
                                                    </form>
                                                    <form action="" method="POST" class="d-inline">
                                                        <input type="hidden" name="third" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="submit_3" class="btn btn-success rounded-pill  mt-1">3rd</button>
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

    <!-- End -->


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