<?php

include 'configuration.php';

// delete
if (isset($_POST['delete_stud_image'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM feature WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Deleted Successfully..!";
        header('Location: feature_admin.php');
    } else {
        $_SESSION['status'] = "Data Not Deleted..!";
        header('Location: feature_admin.php');
    }
}


// edit
if (isset($_POST['submit'])) {
    $id =  $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $queryUpdate = "UPDATE `feature` SET `title`='$title',`description`='$description' WHERE `id`='$id'";
    $resultInsert = mysqli_query($connection, $queryUpdate);
    if (!$resultInsert) {
        $_SESSION["status"] = "Error updating record:" . mysqli_error($connection);
        header("Location: feature_admin.php");
        } else {
            $_SESSION["status"] = "Record updated successfully.";
            header("Location: feature_admin.php");
        }
}
