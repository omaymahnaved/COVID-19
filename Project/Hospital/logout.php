<?php
session_start();

if (isset($_SESSION['username_hospital'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
