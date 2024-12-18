<?php
include 'configuration.php';

session_start();

if (!isset($_SESSION['username_admin'])) {
    header('location: logout.php');
}

// ACCEPT
if (isset($_POST['accept_stud_image'])) {
    $id = $_POST['accept_id'];

    $query = "UPDATE hospital_registeration SET status='Accepted' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been accepted.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: hospital_details.php');
    exit();
}

// Reject
if (isset($_POST['reject_stud_image'])) {
    $id = $_POST['reject_id'];

    $query = "UPDATE hospital_registeration SET status='Rejected' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been rejected.";
    } else {
        $_SESSION['status'] = "Failed to update record.";
    }
    header('Location: hospital_details.php');
    exit();
}

// DELETE
if (isset($_POST['delete_stud_image'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM hospital_registeration WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Record has been rejected.";
    } else {
        $_SESSION['status'] = "Failed to delete record.";
    }
    header('Location: hospital_details.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="admin_panel.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="admin_pic.png" alt="" style="width: 80px; height: 80px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span>Online</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin_panel.php" class="nav-item nav-link "><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="feature_admin.php" class="nav-item nav-link"><i class="fas fa-cogs me-2"></i>Feature</a>
                    <a href="vaccines_admin.php" class="nav-item nav-link"><i
                            class="fas fa-syringe fa me-2"></i>Vaccines</a>
                    <a href="patient_details.php" class="nav-item nav-link"><i
                            class="fas fa-user-injured me-2"></i>Patients</a>
                    <a href="hospital_details.php" class="nav-item nav-link active"><i
                            class="fas fa-hospital me-2"></i>Hospitals</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="admin_panel.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown px-3">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admin_pic.png" alt=""
                                style="width: 80px; height: 80px;">
                            <?php echo "$_SESSION[username_admin]" ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Details start -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white">
                                <h4 class="text-dark text-center mt-3">Applied Hospitals</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        style="font-weight: bold; font-size: 20px;">
                                        <?php echo $_SESSION['status']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php
                                    unset($_SESSION['status']);
                                }
                                ?>
                                <?php
                                $query = "SELECT * FROM hospital_registeration";
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color:black; font-size: 21px;">ID</th>
                                                <th style="color:black; font-size: 21px;">Name</th>
                                                <th style="color:black; font-size: 21px;">Email</th>
                                                <th style="color:black; font-size: 21px;">Status</th>
                                                <th style="color:black; font-size: 21px;">Phone</th>
                                                <th style="color:black; font-size: 21px;">Address</th>
                                                <th style="color:black; font-size: 21px;" class="text-center">Update
                                                </th>
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
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>
                                                        <td class="text-center">
                                                            <form action="" method="POST" class="d-inline">
                                                                <input type="hidden" name="accept_id" value="<?php echo $row['id']; ?>">
                                                                <button type="submit" name="accept_stud_image" class="btn btn-success rounded-pill">Accept</button>
                                                            </form>
                                                            <form action="" method="POST" class="d-inline">
                                                                <input type="hidden" name="reject_id" value="<?php echo $row['id']; ?>">
                                                                <button type="submit" name="reject_stud_image" class="btn btn-success rounded-pill">Reject</button>
                                                            </form>
                                                            <form action="" method="POST" class="d-inline">
                                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                                <button type="submit" name="delete_stud_image" class="btn btn-danger rounded-pill mt-1">Remove</button>
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


        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>